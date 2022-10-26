@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Adicionar Produtos
                        <a href="{{ route('loja.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <form action=" {{ route('loja.store') }} " method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome_produto" id="formGroupExampleInput"
                                    placeholder="Digite o nome do Produto">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Valor</label>
                                <input type="text" class="form-control" name="valor" id="formGroupExampleInput2"
                                    placeholder="Digite o valor do Produto">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Coloque a imagem do Produto</label>
                                <input class="form-control" type="file" name="foto_produto" id="formFile">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Escolha o Utilizador</label>
                                <select class="form-select" aria-label="Default select example" name="estado_produto_id">
                                    <option selected>Estado</option>
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado->id_estado }}"> {{ $estado->id_estado }} - {{ $estado->Estado}}
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
