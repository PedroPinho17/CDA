@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Editar Tipo de Utilizador
                        <a href="{{ route('tipoUser.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <form action=" {{ route('tipoUser.update', ['tipoUser' => $tipoUser->idTpUser]) }} "
                            method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">ID</label>
                                <input type="text" class="form-control" name="idTpUser"
                                    value="{{ $tipoUser->idTpUser}}" id="formGroupExampleInput"
                                    placeholder="Digite o id do tipo de utilizador">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome"
                                    value="{{ $tipoUser->nome }}" id="formGroupExampleInput"
                                    placeholder="Digite o nome">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Descrição</label>
                                <input type="text" class="form-control" name="descricao"
                                    value="{{ $tipoUser->descricao }}" id="formGroupExampleInput"
                                    placeholder="Digite o descricao">
                            </div>
                            <button type="submit" class="btn btn-primary">Submeter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
