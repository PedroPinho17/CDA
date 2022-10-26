@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Adicionar Presidente
                        <a href="{{ route('presidente.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <form action=" {{ route('presidente.store') }} " method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome" id="formGroupExampleInput"
                                    placeholder="Digite o nome do Presidente">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Ano Inicial</label>
                                <input type="text" class="form-control" name="ano_inicio" id="formGroupExampleInput2"
                                    placeholder="Digite o ano inicial">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Ano final</label>
                                <input type="text" class="form-control" name="ano_final" id="formGroupExampleInput2"
                                    placeholder="Digite o ano final">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Coloque a imagem do presidente</label>
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
