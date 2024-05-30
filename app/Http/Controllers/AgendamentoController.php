<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;

class AgendamentoController extends Controller
{
    public function index()
    {
        // $agendamentos = Agenda::factory()->count(10)->create();
        $agendamentos = Agenda::orderBy('id', 'desc')->get();
        return view('agendamentos', ['agendamentos' => $agendamentos]);
    }
}
