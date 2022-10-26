@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Editar Escalão
                        <a href="{{ route('estadoProdutos.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <form action=" {{ route('estadoProdutos.update', ['estadoProduto' => $estadoProduto->id_estado]) }} "
                            method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">ID</label>
                                <input type="text" class="form-control" name="id_estado"
                                    value="{{ $estadoProduto->id_estado }}"="formGroupExampleInput"
                                    placeholder="Digite o id do estado do produto">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="Estado"
                                    value="{{ $estadoProduto->Estado }}" id="formGroupExampleInput"
                                    placeholder="Digite o estado do produto">
                            </div>
                            <button type="submit" class="btn btn-primary">Submeter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
