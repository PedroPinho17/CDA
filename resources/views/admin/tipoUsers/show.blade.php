@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Visualizar Tipo de Utilizador
                        <a href="{{ route('tipoUser.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>ID:</td>
                                <td>{{ $tipoUser->idTpUser  }}</td>
                            </tr>
                            <tr>
                                <td>Nome:</td>
                                <td>{{ $tipoUser->nome }}</td>
                            </tr>
                            <tr>
                                <td>Descrição:</td>
                                <td>{{ $tipoUser->descricao }}</td>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
