@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Editar Presidente
                        <a href="{{ route('presidente.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <form action=" {{ route('presidente.update', ['presidente' => $presidente->id]) }} "
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">ID</label>
                                <input type="text" class="form-control" name="id" value="{{ $presidente->id }}"
                                    id="formGroupExampleInput" placeholder="Digite o id do Presidente">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome" value="{{ $presidente->nome }}"
                                    id="formGroupExampleInput" placeholder="Digite o nome do Presidente">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Ano Inicial</label>
                                <input type="text" class="form-control" name="ano_inicio"
                                    value="{{ $presidente->ano_inicio }}"id="formGroupExampleInput2"
                                    placeholder="Digite o ano inicial">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Ano final</label>
                                <input type="text" class="form-control" name="ano_final"
                                    value="{{ $presidente->ano_final }}"id="formGroupExampleInput2"
                                    placeholder="Digite o ano final">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Coloque a imagem do presidente</label>
                                <input class="form-control" type="file" name="foto" value="{{ $presidente->foto }}"
                                    id="formFile">
                            </div>
                            <button type="submit" class="btn btn-primary">Submeter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
