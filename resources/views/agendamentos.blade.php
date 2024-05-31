<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agendamentos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>