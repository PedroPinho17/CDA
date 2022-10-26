@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Adicionar Estado dos produtos
                        <a href="{{ route('estadoProdutos.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('estadoProdutos.store') }}" method="post" enctype="multipart/form">
                            @csrf
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Estado do Produto</label>
                                <input type="text" class="form-control" name="Estado" id="formGroupExampleInput"
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
