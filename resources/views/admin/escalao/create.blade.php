@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Adicionar Escalão
                        <a href="{{ route('escalao.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('escalao.store') }}" method="post" enctype="multipart/form">
                            @csrf
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nome do Escalão</label>
                                <input type="text" class="form-control" name="nome_escalao" id="formGroupExampleInput"
                                    placeholder="Digite o escalão">
                                {{ $errors->has('nome_escalao') ? $errors->first('nome_escalao') : '' }}
                            </div>
                            <button type="submit" class="btn btn-primary">Submeter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
