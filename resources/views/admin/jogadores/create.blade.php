@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Adicionar jogador
                        <a href="{{ route('jogadores.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <form action=" {{ route('jogadores.store') }} " method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nome:</label>
                                <input type="text" class="form-control" name="nome" id="formGroupExampleInput"
                                    placeholder="Digite o nome do Jogador">
                                {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Peso:</label>
                                <input type="text" class="form-control" name="peso" id="formGroupExampleInput"
                                    placeholder="Digite o peso do Jogador (Ex:80.5 ou 80)">
                                {{ $errors->has('peso') ? $errors->first('peso') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Altura:</label>
                                <input type="text" class="form-control" name="altura" id="formGroupExampleInput"
                                    placeholder="Digite a altura do Jogador (Ex:180)">
                                {{ $errors->has('altura') ? $errors->first('altura') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Número Camisola:</label>
                                <input type="number" class="form-control" name="numero_camisola" id="formGroupExampleInput"
                                    placeholder="Digite o número da camisola do Jogador">
                                {{ $errors->has('numero_camisola') ? $errors->first('numero_camisola') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Posição:</label>
                                <input type="text" class="form-control" name="posicao" id="formGroupExampleInput"
                                    placeholder="Digite a posicao do Jogador">
                                {{ $errors->has('posicao') ? $errors->first('posicao') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Coloque a imagem do Jogador</label>
                                <input class="form-control" type="file" name="foto" id="formFile">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Escolha o escalão</label>
                                <select class="form-select" aria-label="Default select example" name="id_escalao">
                                    <option selected>Escalão:</option>
                                    @foreach ($escaloes as $escalao)
                                        <option value="{{ $escalao->id_escalao }}"> {{ $escalao->id_escalao }} -
                                            {{ $escalao->nome_escalao }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Escolha a Equipa</label>
                                <select class="form-select" aria-label="Default select example" name="id_equipa">
                                    <option selected>Equipa:</option>
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
