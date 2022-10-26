@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Visualizar Presidente
                        <a href="{{ route('presidente.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>ID:</td>
                                    <td>{{ $presidente->id }}</td>
                                </tr>

                                <tr>
                                    <td>Nome:</td>
                                    <td>{{ $presidente->nome }}</td>
                                </tr>

                                <tr>
                                    <td>Ano de inicio:</td>
                                    <td>{{ $presidente->ano_inicio }}</td>
                                </tr>

                                <tr>
                                    <td>Ultimo ano:</td>
                                    <td>{{ $presidente->ano_final }}</td>
                                </tr>

                                <tr>
                                    <td>Foto:</td>
                                    <td>
                                        <img style="width:5rem; height:5rem;"
                                            src="/storage/foto_presidente/{{ $presidente->foto }}"
                                            alt="{{ $presidente->foto }}">
                                        <br>
                                        {{ $presidente->foto }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
