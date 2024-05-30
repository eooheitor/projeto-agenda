@extends('index')

@section('title', 'Reserve sua mesa')

@section('content')
    <div class="container">
        <div class="row">
            @if ($errors->any())
                @foreach ($errors->all() as $index => $error)
                    <div class="toast align-items-end text-white bg-danger border-0" role="alert" aria-live="assertive"
                        aria-atomic="true" data-delay="{{ $index * 2000 }}" style="position: fixed; right: 15px;">
                        <div class="d-flex">
                            <div class="toast-body">
                                {{ $error }}
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                    </div>
                @endforeach
            @endif
            @if (session('success'))
                <div class="toast align-items-end text-white bg-success border-0" role="alert" aria-live="assertive"
                    aria-atomic="true" data-delay="5000" style="position: fixed; right: 15px;">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{ session('success') }}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if (session('error'))
                <div class="toast align-items-end text-white bg-danger border-0" role="alert" aria-live="assertive"
                    aria-atomic="true" data-delay="5000" style="position: fixed; right: 15px;">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{ session('error') }}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
            @endif
            <div class="container">
                <div class="title mb-4 text-center">
                    <h2 class="">Olá, Reserve sua mesa!</h2>
                    <span>Você tem 1hr e 50 minutos de reserva, <br> exemplo: das 18:00 até as 19:50</span>
                </div>
                <form class="row g-3" method="post">
                    @csrf
                    <div class="col-md-6">
                        <label for="" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome"
                            value="{{ old('nome') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Telefone</label>
                        <input type="number" class="form-control" id="telefone" name="telefone"
                            value="{{ old('telefone') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Data</label>
                        <input type="date" class="form-control" id="data" name="data"
                            value="{{ old('data') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Horário de entrada</label>
                        <select class="form-select" id="hora" name="hora" value="{{ old('hora') }}">
                            <option value="" selected disabled>Selecione</option>
                            <option value="18:00">18:00</option>
                            <option value="18:30">18:30</option>
                            <option value="19:00">19:00</option>
                            <option value="19:30">19:30</option>
                            <option value="20:00">20:00</option>
                            <option value="20:30">20:30</option>
                            <option value="21:00">21:00</option>
                            <option value="21:30">21:30</option>
                            <option value="22:00">22:00</option>
                            <option value="22:30">22:30</option>
                            <option value="23:00">23:00</option>
                            <option value="23:30">23:30</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Mesa</label>
                        <select id="" class="form-select" name="mesa" id="mesa"
                            value="{{ old('mesa') }}">
                            <option disabled selected>Selecione uma mesa</option>
                            <option value="1">Mesa 1</option>
                            <option value="2">Mesa 2</option>
                            <option value="3">Mesa 3</option>
                            <option value="4">Mesa 4</option>
                            <option value="5">Mesa 5</option>
                            <option value="6">Mesa 6</option>
                            <option value="7">Mesa 7</option>
                            <option value="8">Mesa 8</option>
                            <option value="9">Mesa 9</option>
                            <option value="10">Mesa 10</option>
                            <option value="11">Mesa 11</option>
                            <option value="12">Mesa 12</option>
                            <option value="13">Mesa 13</option>
                            <option value="14">Mesa 14</option>
                            <option value="15">Mesa 15</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Número de pessoas</label>
                        <select class="form-select" id="nropessoas" name="nropessoas" value="{{ old('nropessoas') }}">
                            <option value="" disabled selected>Selecione</option>
                            <option value="1">1 Pessoa</option>
                            <option value="2">2 Pessoas</option>
                            <option value="3">3 Pessoas</option>
                            <option value="4">4 Pessoas</option>
                            <option value="5">5 Pessoas</option>
                            <option value="Até 10">Até 10 Pessoas</option>
                            <option value="Até 15">Até 15 Pessoas</option>
                            <option value="Até 20">Até 20 Pessoas</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Ocasião</label>
                        <select class="form-select" id="ocasiao" name="ocasiao" value="{{ old('ocasiao') }}">
                            <option value="" disabled selected>Selecione</option>
                            <option value="Comemorar aniversário">Comemorar aniversário</option>
                            <option value="Curtir com os amigos">Curtir com os amigos</option>
                            <option value="Sair com namorado(a)">Sair com namorado(a)</option>
                            <option value="Sair com a família">Sair com a família</option>
                            <option value="Outra">Outra</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Reservar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

