@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Adicionar Equipa
                        <a href="{{ route('equipa.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <form action=" {{ route('equipa.store') }} " method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nome:</label>
                                <input type="text" class="form-control" name="nome" id="formGroupExampleInput"
                                    placeholder="Digite o nome da Equipa">
                                {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Tipo de Equipa:</label>
                                <input type="text" class="form-control" name="tipo_Equipa" id="formGroupExampleInput"
                                    placeholder="Digite o tipo de equipa">
                                {{ $errors->has('tipo_Equipa') ? $errors->first('tipo_Equipa') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Coloque a imagem da Equipa</label>
                                <input class="form-control" type="file" name="imagemEquipa" id="formFile">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Escolha o escalão</label>
                                <select class="form-select" aria-label="Default select example" name="id_escalao">
                                    <option selected>Escalão:</option>
                                    @foreach ($escaloes as $escalao)
                                        <option value="{{ $escalao->id_escalao }}"> {{ $escalao->id_escalao }} -
                                            {{ $escalao->nome_escalao }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Escolha a Equipa Técnica</label>
                                <select class="form-select" aria-label="Default select example" name="id_equipaTecnica ">
                                    <option selected>Equipa Ténica:</option>
                                    @foreach ($equipaTec as $equipaTecnica)
                                        <option value="{{ $equipaTecnica->id_equipaTec }}">
                                            {{ $equipaTecnica->id_equipaTec }} - {{ $equipaTecnica->nome }}</option>
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
