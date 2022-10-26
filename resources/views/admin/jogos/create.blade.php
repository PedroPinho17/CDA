@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Adicionar Jogo
                        <a href="{{ route('jogos.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('jogos.store') }}" method="post" enctype="multipart/form">
                            @csrf
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Equipa Visitante:</label>
                                <input type="text" class="form-control" name="equipa_visitante"
                                    id="formGroupExampleInput" placeholder="Digite a equipa adversária">
                                {{ $errors->has('equipa_visitante') ? $errors->first('equipa_visitante') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Resultado:</label>
                                <input type="text" class="form-control" name="resultado" id="formGroupExampleInput"
                                    placeholder="Digite o resultado">
                                {{ $errors->has('resultado') ? $errors->first('resultado') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Data:</label>
                                <input type="text" class="form-control" name="data" value="{{ $data }}"
                                    id="formGroupExampleInput" placeholder="Digite a data do Jogo">
                                {{ $errors->has('data') ? $errors->first('data') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Resultado:</label>
                                <input type="text" class="form-control" name="link" id="formGroupExampleInput"
                                    placeholder="Digite o link">
                                {{ $errors->has('link') ? $errors->first('link') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Escolha a equipa que pertence</label>
                                <select class="form-select" aria-label="Default select example" name="equipa_id">
                                    <option selected>Equipas</option>
                                    @foreach ($equipas as $equipa)
                                        <option value="{{ $equipa->id_equipa }}"> {{ $equipa->id_equipa }} -
                                            {{ $equipa->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submeter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
