@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Visualizar Membro
                        <a href="{{ route('detalhe-membro.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <div class>
                            <table class="table-responsive">
                                <tr>
                                    <td>ID:</td>
                                    <td>{{ $detalhe_membro->id_detalhe_membro }}</td>
                                </tr>

                                <tr>
                                    <td>Nome:</td>
                                    <td>{{ $detalhe_membro->nome_membro }}</td>
                                </tr>
                                <tr>
                                    <td>Cargo:</td>
                                    <td>{{ $detalhe_membro->cargo }}</td>
                                </tr>
                                <tr>
                                    <td>Foto:</td>
                                    <td>
                                        <img style="width:10rem; height:10rem;"
                                            src="/storage/Membros/{{ $detalhe_membro->foto }}"
                                            alt="{{ $detalhe_membro->foto }}">
                                        <br>
                                        {{ $detalhe_membro->foto }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Departamento de Membros:</td>
                                    <td>{{ $detalhe_membro->membro_id }} - {{ $detalhe_membro->membro->nome }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
