@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Adicionar Detalhe em um Jogador
                        <a href="{{ route('detalhes_jogadores.index') }}" class="float-right"
                            style="margin-right:0.8rem"><img src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('detalhes_jogadores.store') }}" method="post" enctype="multipart/form">
                            @csrf
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nome Completo:</label>
                                <input type="text" class="form-control" name="nome_completo" id="formGroupExampleInput"
                                    placeholder="Digite o nome completo">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Data de Nascimento:</label>
                                <input type="text" class="form-control" name="data_nascimento" id="formGroupExampleInput"
                                    placeholder="Digite a data de nascimento">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Naturalidade:</label>
                                <input type="text" class="form-control" name="Naturalidade" id="formGroupExampleInput"
                                    placeholder="Digite a naturalidade">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Informação:</label>
                                <textarea class="form-control" placeholder="Escreva a descrição aqui" name="info" id="floatingTextarea"></textarea>
                                {{--<input type="text" class="form-control" name="info" id="formGroupExampleInput"
                                    placeholder="Digite a informação">--}}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Link:</label>
                                <input type="text" class="form-control" name="link" id="formGroupExampleInput"
                                    placeholder="Digite o link">
                            </div>

                            {{--<div class="mb-3">
                                <label for="formFile" class="form-label">Escolha o Jogador</label>
                                <select class="form-select" aria-label="Default select example" name="e">
                                    <option selected>Equipa</option>
                                    @foreach ($equipas as $equipa)
                                        <option value="{{ $equipa->id_equipa }}"> {{ $equipa->id_equipa }} -
                                            {{ $equipa->nome }}</option>
                                    @endforeach
                                </select>
                            </div>--}}

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Escolha o Jogador</label>
                                <select class="form-select" aria-label="Default select example" name="jogador_id">
                                    <option selected>Jogadores</option>
                                    @foreach ($jogadores as $jogador)
                                        <option value="{{ $jogador->id_jogador }}"> {{ $jogador->id_jogador }} -
                                            {{ $jogador->nome }}</option>
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
