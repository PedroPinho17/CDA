@extends('layouts.master')
@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Visualizar Post
                        <a href="{{ route('posts.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>ID:</td>
                                    <td>{{ $post->id_post }}</td>
                                </tr>
                                <tr>
                                    <td>Titulo:</td>
                                    <td>{{ $post->titulo }}</td>
                                </tr>
                                <tr>
                                    <td>Descrição:</td>
                                    <td>{{ $post->descricao }}</td>
                                </tr>
                                <tr>
                                    <td>Foto:</td>
                                    <td>
                                        <img style="width:10rem; height:10rem;" src="/storage/posts/{{ $post->foto }}"
                                            alt="{{ $post->foto }}">
                                        <br>
                                        {{ $post->foto }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Data:</td>
                                    <td>{{ date('d-m-Y', strtotime($post->data)) }}</td>
                                </tr>
                                <tr>
                                    <td>Link:</td>
                                    <td><a href="{{ $post->link }}" target="_blank">{{ $post->link }}</a></td>
                                </tr>
                                <tr>
                                    <td>user:</td>
                                    <td>{{ $post->user_id }} - {{ $post->user->name }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
