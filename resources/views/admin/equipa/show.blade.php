@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Visualizar Equipa
                        <a href="{{ route('equipa.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>ID:</td>
                                    <td>{{ $equipa->id_equipa }}</td>
                                </tr>

                                <tr>
                                    <td>Titulo:</td>
                                    <td>{{ $equipa->nome }}</td>
                                </tr>
                                <tr>
                                    <td>Tipo de Equipa:</td>
                                    <td>{{ $equipa->tipo_Equipa }}</td>
                                </tr>
                                <tr>
                                    <td>Foto:</td>
                                    <td>
                                        <img style="width:10rem; height:10rem;"
                                            src="/storage/equipa/{{ $equipa->imagemEquipa }}"
                                            alt="{{ $equipa->imagemEquipa }}">
                                        <br>
                                        {{ $equipa->imagemEquipa }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Escalão:</td>
                                    <td>{{ $equipa->id_escalao }} - {{ $equipa->escalao->nome_escalao }}</td>
                                </tr>
                                <tr>
                                    <td>Equipa Técnica:</td>
                                    <td>{{ $equipa->id_equipaTecnica }} - {{ $equipa->equipaTec->nome }} </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
