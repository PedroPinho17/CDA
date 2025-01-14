@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Visualizar Patrocinio
                        <a href="{{ route('patrocinadores.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>ID:</td>
                                <td>{{ $patrocinadore->id }}</td>
                            </tr>

                            <tr>
                                <td>Titulo:</td>
                                <td>{{ $patrocinadore->nome }}</td>
                            </tr>

                            <tr>
                                <td>Descrição:</td>
                                <td>{{ $patrocinadore->descricao }}</td>
                            </tr>

                            <tr>
                                <td>Link:</td>
                                <td><a href="{{ $patrocinadore->link }}" target="_blank">{{ $patrocinadore->link }}</a></td>
                            </tr>

                            <tr>
                                <td>Foto:</td>
                                <td>
                                    <img style="width:10rem; height:10rem;"
                                        src="/storage/patrocinadores/{{ $patrocinadore->foto }}"
                                        alt="{{ $patrocinadore->foto }}">
                                    <br>
                                    {{ $patrocinadore->foto }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
