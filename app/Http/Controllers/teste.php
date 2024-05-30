<?php
function store(Request $request)
{
  $request->validate([
    'mesa_id' => 'required|exists:mesas,id',
    'data' => 'required|date',
    'hora' => 'required|date_format:H:i',
  ]);

  $mesaId = $request->input('mesa_id');
  $data = $request->input('data');
  $hora = $request->input('hora');

  // Verificação do dia da semana
  $dataCarbon = Carbon::createFromFormat('Y-m-d', $data);
  if ($dataCarbon->isSunday()) {
    return response()->json(['error' => 'O restaurante não aceita reservas aos domingos.'], 400);
  }

  $horaInicio = Carbon::createFromFormat('H:i', $hora);
  $horaInicioMin = $horaInicio->copy()->subHours(2);
  $horaFimMax = $horaInicio->copy()->addHours(2);

  $conflito = Reserva::where('mesa_id', $mesaId)
    ->where('data', $data)
    ->where(function ($query) use ($horaInicioMin, $horaFimMax) {
      $query->whereBetween('hora', [$horaInicioMin, $horaFimMax]);
    })
    ->exists();

  if ($conflito) {
    // Encontrar o próximo horário disponível
    $reservas = Reserva::where('mesa_id', $mesaId)
      ->where('data', $data)
      ->orderBy('hora', 'asc')
      ->get();

    $proximoHorarioDisponivel = null;
    $horaFimAtual = Carbon::createFromFormat('H:i', '00:00');

    foreach ($reservas as $reserva) {
      $horaInicioReserva = Carbon::createFromFormat('H:i', $reserva->hora);
      $horaFimReserva = $horaInicioReserva->copy()->addHours(2);

      if ($horaFimAtual->diffInMinutes($horaInicioReserva) >= 120) {
        $proximoHorarioDisponivel = $horaFimAtual->copy();
        break;
      }

      $horaFimAtual = $horaFimReserva;
    }

    if (!$proximoHorarioDisponivel) {
      $proximoHorarioDisponivel = $horaFimAtual->copy();
    }

    return response()->json([
      'error' => 'A mesa já está reservada nesse intervalo de tempo.',
      'proximo_horario_disponivel' => $proximoHorarioDisponivel->format('H:i')
    ], 409);
  }

  $reserva = new Reserva();
  $reserva->mesa_id = $mesaId;
  $reserva->data = $data;
  $reserva->hora = $hora;
  $reserva->save();

  return response()->json(['message' => 'Reserva criada com sucesso!'], 201);
}
