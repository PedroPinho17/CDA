@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Editar Detalhe do Jogador <strong>{{ $detalhes_jogadore->jogador->nome }}</strong>
                        <a href="{{ route('detalhes_jogadores.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <form
                            action=" {{ route('detalhes_jogadores.update', ['detalhes_jogadore' => $detalhes_jogadore->id]) }} "
                            method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">ID</label>
                                <input type="text" class="form-control" name="id"
                                    value="{{ $detalhes_jogadore->id }}"="formGroupExampleInput"
                                    placeholder="Digite o id do detalhe do jogador">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" name="nome_completo"
                                    value="{{ $detalhes_jogadore->nome_completo }}" id="formGroupExampleInput"
                                    placeholder="Digite o nome completo">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Data Nascimento</label>
                                <input type="text" class="form-control" name="data_nascimento"
                                    value="{{ $detalhes_jogadore->data_nascimento }}" id="formGroupExampleInput"
                                    placeholder="Digite a data de nascimento">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Naturalidade</label>
                                <input type="text" class="form-control" name="Naturalidade"
                                    value="{{ $detalhes_jogadore->Naturalidade }}" id="formGroupExampleInput"
                                    placeholder="Digite a Naturalidade">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Informações</label>
                                <input type="text" class="form-control" name="info"
                                    value="{{ $detalhes_jogadore->info }}" id="formGroupExampleInput"
                                    placeholder="Digite a informações do jogador">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Link</label>
                                <input type="text" class="form-control" name="link"
                                    value="{{ $detalhes_jogadore->link }}" id="formGroupExampleInput"
                                    placeholder="Digite o link">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Escolha o jogador</label>
                                <select class="form-select" aria-label="Default select example" name="jogador_id">
                                    <option>jogadores</option>
                                    @foreach ($jogadores as $jogador)
                                        @if ($jogador->id_jogador == $detalhes_jogadore->jogador_id)
                                            <option value="{{ $jogador->id_jogador }}" selected> {{ $jogador->id_jogador }}
                                                - {{ $jogador->nome }}</option>
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
