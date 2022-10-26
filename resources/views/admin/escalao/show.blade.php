@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Visualizar Escalão
                        <a href="{{ route('escalao.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>ID:</td>
                                <td>{{ $escalao->id_escalao }}</td>
                            </tr>
                            <tr>
                                <td>Nome:</td>
                                <td>{{ $escalao->nome_escalao }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
