@extends('layouts.master')
@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Adicionar Post
                        <a href="{{ route('posts.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>
                    <div class="card-body">
                        <form action=" {{ route('posts.store') }} " method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Titulo:</label>
                                <input type="text" class="form-control" name="titulo" id="formGroupExampleInput"
                                    placeholder="Digite o titulo do Post">
                                {{ $errors->has('titulo') ? $errors->first('titulo') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Descrição:</label>
                                {{-- <input type="text" class="form-control" name="descricao" id="formGroupExampleInput"
                                    placeholder="Digite o descrição do Post">
                                {{ $errors->has('descricao') ? $errors->first('descricao') : '' }} --}}
                                <textarea class="form-control" placeholder="Escreva a descrição aqui" name="descricao" id="floatingTextarea"></textarea>

                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label"> Data:</label>
                                <input type="text" class="form-control" name="data" value="{{ $data }}"
                                    id="formGroupExampleInput" placeholder="Digite a data do Post">
                                <!--<input type="date" class="form-control" name="data" value="{{ $data }}" id="formGroupExampleInput" placeholder="Digite a data do Post">-->
                                {{ $errors->has('data') ? $errors->first('data') : '' }}
                            </div>

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Link:</label>
                                <input type="text" class="form-control" name="link" id="formGroupExampleInput"
                                    placeholder="Digite o link do Post">
                                {{ $errors->has('link') ? $errors->first('link') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Coloque a imagem do Post</label>
                                <input class="form-control" type="file" name="foto" id="formFile">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Escolha o Utilizador</label>
                                <select class="form-select" aria-label="Default select example" name="user_id">
                                    <option>Utilizadores</option>
                                    @foreach ($users as $user)
                                        @if ($user->id == auth()->user()->id)
                                            <option selected value="{{ $user->id }}"> {{ $user->id }} -
                                                {{ $user->name }}
                                            @else
                                            <option value="{{ $user->id }}"> {{ $user->id }} -
                                                {{ $user->name }}
                                        @endif

                                        </option>
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
