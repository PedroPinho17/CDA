@extends('layouts.master')
@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Editar Post
                        <a href="{{ route('posts.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>
                    <div class="card-body">
                        <form action=" {{ route('posts.update', ['post' => $post->id_post]) }} " method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">ID</label>
                                <input type="text" class="form-control" name="id_post " value="{{ $post->id_post }}"
                                    id="formGroupExampleInput" placeholder="Digite o Id do membro">
                                {{ $errors->has('id_post') ? $errors->first('id_post') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="titulo" value="{{ $post->titulo }}"
                                    id="formGroupExampleInput" placeholder="Digite o Titulo do Post">
                                {{ $errors->has('titulo') ? $errors->first('titulo') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Descrição:</label>
                                {{--<textarea class="form-control" placeholder="Escreva a descrição aqui" name="descricao" value="{{ $post->descricao }}" id="floatingTextarea"></textarea>--}}
                                <input type="text" class="form-control" name="descricao" value="{{ $post->descricao }}"
                                    id="formGroupExampleInput" placeholder="Digite a descrição do Post">
                                {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Data:</label>
                                <input type="text" class="form-control" name="data"
                                    value="{{ date('d-m-Y', strtotime($post->data)) }}" id="formGroupExampleInput"
                                    placeholder="Digite a data do Post">
                                {{ $errors->has('data') ? $errors->first('data') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Link:</label>
                                <input type="text" class="form-control" name="link" value="{{ $post->link }}"
                                    id="formGroupExampleInput" placeholder="Digite o link do Post">
                                {{ $errors->has('link') ? $errors->first('link') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Coloque a imagem do Post</label>
                                <input class="form-control" type="file" name="foto" id="formFile">
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Escolha o Utilizador</label>
                                <select class="form-select" aria-label="Default select example" name="user_id">
                                    <option style="text-align:center;">Utilizador</option>
                                    @foreach ($users as $user)
                                        @if ($user->id == $post->user_id)
                                            <option value="{{ $user->id }}" selected> {{ $user->id }} -
                                                {{ $user->name }}</option>
                                        @else
                                            <option value="{{ $user->id }}"> {{ $user->id }} -
                                                {{ $user->name }}</option>
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
