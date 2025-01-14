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
                        <form action=" {{ route('galeria.store') }} " method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Titulo</label>
                                <input type="text" class="form-control" name="titulo" id="formGroupExampleInput"
                                    placeholder="Digite o titulo da imagem">
                                {{ $errors->has('titulo') ? $errors->first('titulo') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Descrição</label>
                                <input type="text" class="form-control" name="descricao" id="formGroupExampleInput2"
                                    placeholder="Digite a descricao da imagem">
                                {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">Digite o link da imagem</span>
                                <textarea class="form-control" name="link" aria-label="With textarea"></textarea>
                                {{ $errors->has('link') ? $errors->first('link') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Coloque uma nova imagem</label>
                                <input class="form-control" type="file" name="foto" id="formFile">
                            </div>
                            <button type="submit" class="btn btn-primary">Submeter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
