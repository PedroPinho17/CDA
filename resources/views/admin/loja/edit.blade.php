@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Editar Produtos
                        <a href="{{ route('loja.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <form action=" {{ route('loja.update', ['loja' => $loja->id_produto]) }} " method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">ID</label>
                                <input type="text" class="form-control" name="id_produto"
                                    value="{{ $loja->id_produto }}"="formGroupExampleInput"
                                    placeholder="Digite o id do Produto">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome_produto"
                                    value="{{ $loja->nome_produto }} " id="formGroupExampleInput"
                                    placeholder="Digite o nome do Produto">
                                {{ $errors->has('nome_produto') ? $errors->first('nome_produto') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Valor</label>
                                <input type="text" class="form-control" name="valor"
                                    value="{{ $loja->valor }}"id="formGroupExampleInput2"
                                    placeholder="Digite o valor do Produto">
                                {{ $errors->has('valor') ? $errors->first('valor') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Coloque a imagem do Produto</label>
                                <input class="form-control" type="file" name="foto_produto"
                                    value="{{ $loja->foto_produto }}"id="formFile">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Escolha o Utilizador</label>
                                <select class="form-select" aria-label="Default select example" name="estado_produto_id">
                                    <option style="text-align:center;">Estado</option>
                                    @foreach ($estados as $estado)
                                        @if ($estado->id_estado == $loja->estado_produto_id)
                                            <option value="{{ $estado->id_estado }}" selected> {{ $estado->id_estado }} -
                                                {{ $estado->Estado }}</option>
                                        @else
                                            <option value="{{ $estado->id_estado }}"> {{ $estado->id_estado }} -
                                                {{ $estado->Estado }}</option>
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
