<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use Carbon\Carbon;

class AgendaController extends Controller
{

    public function store(Request $request)
    {
        $messages = [
            'nome.required' => 'O campo Nome é obrigatório',
            'telefone.required' => 'O campo Telefone é obrigatório',
            'data.required' => 'O campo Data é obrigatório',
            'hora.required' => 'O campo Hora é obrigatório',
            'mesa.required' => 'O campo Mesa é obrigatório',
            'nropessoas.required' => 'O campo Número de pessoas é obrigatório',
            'ocasiao.required' => 'O campo Ocasião é obrigatório',
        ];

        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'data' => 'required|date',
            'hora' => 'required|string',
            'mesa' => 'required|integer',
            'nropessoas' => 'required|integer',
            'ocasiao' => 'required|string|max:100',
        ], $messages);

        $mesa = $request->mesa;
        $data = $request->data;
        $hora = $request->hora;

        $dataCarbon = Carbon::createFromFormat('Y-m-d', $data);
        if ($dataCarbon->isSunday()) {
            return redirect()->back()->with('error', 'Desculpe, não trabalhamos aos domingos, reserve outro dia!');
        }

        $horaInicio = Carbon::createFromFormat('H:i', $hora);
        $horaInicioMin = $horaInicio->copy()->subHours(1)->subMinutes(50);
        $horaFimMax = $horaInicio->copy()->addHours(1)->addMinutes(50);

        $reservas = Agenda::where('mesa', $mesa)
            ->where('data', $data)
            ->where(function ($query) use ($horaInicioMin, $horaFimMax) {
                $query->whereBetween('hora', [$horaInicioMin, $horaFimMax]);
            })
            ->exists();

        if ($reservas) {
            return redirect()->back()->with('error', 'A mesa selecionada já está reservada para esse horário');
        }


        Agenda::create([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'data' => $request->data,
            'hora' => $request->hora,
            'mesa' => $request->mesa,
            'nropessoas' => $request->nropessoas,
            'ocasiao' => $request->ocasiao,
        ]);

        return redirect('/agenda')->with('success', 'Reserva realizada com sucesso!');
    }
}
