@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Editar Equipa Técnica
                        <a href="{{ route('equipaTec.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <form action=" {{ route('equipaTec.update', ['equipaTec' => $equipaTec->id_equipaTec]) }} "
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">ID</label>
                                <input type="text" class="form-control" name="id_equipaTec "
                                    value="{{ $equipaTec->id_equipaTec }}"="formGroupExampleInput"
                                    placeholder="Digite o id da equipa tecnica">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome" value="{{ $equipaTec->nome }}"
                                    id="formGroupExampleInput" placeholder="Digite o nome da equipa tecnica">
                                {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Coloque a imagem da equipa Técnica</label>
                                <input class="form-control" type="file" name="foto"
                                    value="{{ $equipaTec->foto }}"id="formFile">
                            </div>
                            <button type="submit" class="btn btn-primary">Submeter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
