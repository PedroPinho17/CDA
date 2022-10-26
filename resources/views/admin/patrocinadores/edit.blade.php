@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Editar Patrocinio
                        <a href="{{ route('patrocinadores.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <form action=" {{ route('patrocinadores.update', ['patrocinadore' => $patrocinadore->id]) }} "
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">ID</label>
                                <input type="text" class="form-control" name="id"
                                    value="{{ $patrocinadore->id }}"="formGroupExampleInput"
                                    placeholder="Digite o id do Patrocinio">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome"
                                    value="{{ $patrocinadore->nome }}" id="formGroupExampleInput"
                                    placeholder="Digite o nome do patrocinio">
                                {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Descrição:</label>
                                <input type="text" class="form-control" name="descricao"
                                    value="{{ $patrocinadore->descricao }}"id="formGroupExampleInput2"
                                    placeholder="Digite a descrição do patrocinio">
                                {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Link:</label>
                                <input type="text" class="form-control" name="link"
                                    value="{{ $patrocinadore->link }}"id="formGroupExampleInput2"
                                    placeholder="Digite o link do patrocinio">
                                {{ $errors->has('link') ? $errors->first('link') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Coloque a imagem do Patrocinador</label>
                                <input class="form-control" type="file" name="foto"
                                    value="{{ $patrocinadore->foto }}"id="formFile">
                            </div>
                            <button type="submit" class="btn btn-primary">Submeter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
