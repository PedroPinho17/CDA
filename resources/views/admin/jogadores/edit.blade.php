@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Editar jogador
                        <a href="{{ route('jogadores.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <form action=" {{ route('jogadores.update', ['jogadore' => $jogadore->id_jogador]) }} "
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">ID:</label>
                                <input type="text" class="form-control" name="id_jogador "
                                    value="{{ $jogadore->id_jogador }}" id="formGroupExampleInput"
                                    placeholder="Digite o Id do Jogador">
                                {{ $errors->has('id_jogador') ? $errors->first('id_jogador') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome" value="{{ $jogadore->nome }}"
                                    id="formGroupExampleInput" placeholder="Digite o nome do Jogador">
                                {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Peso:</label>
                                <input type="text" class="form-control" name="peso" value="{{ $jogadore->peso }}"
                                    id="formGroupExampleInput" placeholder="Digite o peso do Jogador">
                                {{ $errors->has('peso') ? $errors->first('peso') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Altura:</label>
                                <input type="text" class="form-control" name="altura" value="{{ $jogadore->altura }}"
                                    id="formGroupExampleInput" placeholder="Digite a altura do Jogador">
                                {{ $errors->has('altura') ? $errors->first('altura') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Número Camisola:</label>
                                <input type="number" class="form-control" name="numero_camisola"
                                    value="{{ $jogadore->numero_camisola }}" id="formGroupExampleInput"
                                    placeholder="Digite o número da camisola do Jogador">
                                {{ $errors->has('numero_camisola') ? $errors->first('numero_camisola') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Posição:</label>
                                <input type="text" class="form-control" name="posicao" value="{{ $jogadore->posicao }}"
                                    id="formGroupExampleInput" placeholder="Digite a posição do Jogador">
                                {{ $errors->has('posicao') ? $errors->first('posicao') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Coloque a imagem do Jogador</label>
                                <input class="form-control" type="file" name="foto" method id="formFile">
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Escolha o Escalão</label>
                                <select class="form-select" aria-label="Default select example" name="id_escalao">
                                    <option>Escalão:</option>
                                    @foreach ($escaloes as $escalao)
                                        @if ($escalao->id_escalao == $jogadore->id_escalao)
                                            <option value="{{ $escalao->id_escalao }}" selected>
                                                {{ $escalao->id_escalao }} - {{ $escalao->nome_escalao }}</option>
                                        @else
                                            <option value="{{ $escalao->id_escalao }}"> {{ $escalao->id_escalao }} -
                                                {{ $escalao->nome_escalao }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Escolha a Equipa</label>
                                <select class="form-select" aria-label="Default select example" name="id_equipa">
                                    <option>Equipa </option>
                                    @foreach ($equipas as $equipa)
                                        @if ($equipa->id_equipa == $jogadore->id_equipa)
                                            <option value="{{ $equipa->id_equipa }}" selected> {{ $equipa->id_equipa }}
                                                - {{ $equipa->nome }}</option>
                                        @else
                                            <option value="{{ $equipa->id_equipa }}"> {{ $equipa->id_equipa }} -
                                                {{ $equipa->nome }}</option>
                                        @endif
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
