@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Visualizar Imagem
                        <a href="{{ route('galeria.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>ID:</td>
                                    <td>{{ $galerium->id }}</td>
                                </tr>

                                <tr>
                                    <td>Titulo:</td>
                                    <td>{{ $galerium->titulo }}</td>
                                </tr>

                                <tr>
                                    <td>Descrição:</td>
                                    <td>{{ $galerium->descricao }}</td>
                                </tr>

                                <tr>
                                    <td>Link:</td>
                                    <td><a href="{{ $galerium->link }}" target="_blank">{{ $galerium->link }}</a></td>
                                </tr>

                                <tr>
                                    <td>Foto:</td>
                                    <td>
                                        <img style="width:10rem; height:10rem;" src="/storage/galeria/{{ $galerium->foto }}"
                                            alt="{{ $galerium->foto }}">
                                        <br>
                                        {{ $galerium->foto }}
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
