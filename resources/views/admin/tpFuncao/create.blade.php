@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Adicionar Treinador
                        <a href="{{ route('tpFuncao-equipaTec.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>
                    <div class="card-body">
                        <form action=" {{ route('tpFuncao-equipaTec.store') }} " method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nome:</label>
                                <input type="text" class="form-control" name="nome_treinador" id="formGroupExampleInput"
                                    placeholder="Digite o nome do Treinador">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Função:</label>
                                <input type="text" class="form-control" name="funcao" id="formGroupExampleInput"
                                    placeholder="Digite a função do Treinador">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Coloque a imagem do Treinador</label>
                                <input class="form-control" type="file" name="foto_treinador" id="formFile">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Escolha o escalão</label>
                                <select class="form-select" aria-label="Default select example" name="id_equipaTec">
                                    <option selected>Escalão:</option>
                                    @foreach ($equipaTecnicas as $equipaTecnica)
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
