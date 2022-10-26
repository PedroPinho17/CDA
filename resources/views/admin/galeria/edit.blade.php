@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Adicionar Fotografia
                        <a href="{{ route('galeria.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <form action=" {{ route('galeria.update', ['galerium' => $galerium->id]) }} " method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">ID</label>
                                <input type="text" class="form-control" name="id"
                                    value="{{ $galerium->id }}"="formGroupExampleInput"
                                    placeholder="Digite o id da imagem">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Titulo:</label>
                                <input type="text" class="form-control" name="titulo" value="{{ $galerium->titulo }}"
                                    id="formGroupExampleInput" placeholder="Digite o titulo da imagem">
                                {{ $errors->has('titulo') ? $errors->first('titulo') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Descrição:</label>
                                <input type="text" class="form-control" name="descricao"
                                    value="{{ $galerium->descricao }}"id="formGroupExampleInput2"
                                    placeholder="Digite a descrição da imagem">
                                {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Link:</label>
                                <input type="text" class="form-control" name="link"
                                    value="{{ $galerium->link }}"id="formGroupExampleInput2"
                                    placeholder="Digite o link da imagem">
                                {{ $errors->has('link') ? $errors->first('link') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Coloque a imagem</label>
                                <input class="form-control" type="file" name="foto"
                                    value="{{ $galerium->foto }}"id="formFile">
                            </div>
                            <button type="submit" class="btn btn-primary">Submeter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
