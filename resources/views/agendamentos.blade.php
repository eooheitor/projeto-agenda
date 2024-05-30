@extends('index')

@section('title', 'Agendamentos')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title text-center mb-4">
                    <h3>Mesas Agendadas</h3>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Data</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Mesa</th>
                            <th scope="col">Número de pessoas</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                      @foreach($agendamentos as $agendamento)
                        <tr>
                            <th scope="row">{{$agendamento->id}}</th>
                            <td>{{$agendamento->nome}}</td>
                            <td>{{$agendamento->telefone}}</td>
                            <td>{{date('d-m-Y', strtotime($agendamento->data));}}</td>
                            <td>{{ date("H:i", strtotime($agendamento->hora)) }}</td>
                            <td>{{$agendamento->mesa}}</td>
                            <td>{{$agendamento->nropessoas}}</td>
                        </tr>
                      @endforeach  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
