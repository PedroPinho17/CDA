@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Editar Membro
                        <a href="{{ route('detalhe-membro.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <form
                            action=" {{ route('detalhe-membro.update', ['detalhe_membro' => $detalhe_membro->id_detalhe_membro]) }} "
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">ID</label>
                                <input type="text" class="form-control" name="id_detalhe_membro"
                                    value="{{ $detalhe_membro->id_detalhe_membro }}" id="formGroupExampleInput"
                                    placeholder="Digite o nome do membro">
                                {{ $errors->has('id_detalhe_membro') ? $errors->first('id_detalhe_membro') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome_membro"
                                    value="{{ $detalhe_membro->nome_membro }}" id="formGroupExampleInput"
                                    placeholder="Digite o nome do membro">
                                {{ $errors->has('nome_membro') ? $errors->first('nome_membro') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Cargo:</label>
                                <input type="text" class="form-control" name="cargo"
                                    value="{{ $detalhe_membro->cargo }}" id="formGroupExampleInput"
                                    placeholder="Digite o cargo do membro">
                                {{ $errors->has('cargo') ? $errors->first('cargo') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Coloque a imagem do Membro</label>
                                <input class="form-control" type="file" name="foto"
                                    value="{{ $detalhe_membro->foto }}" method id="formFile">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Escolha o Utilizador</label>
                                <select class="form-select" aria-label="Default select example" name="membro_id">
                                    <option>Departamento Membro</option>
                                    @foreach ($membros as $membro)
                                        @if ($membro->id == $detalhe_membro->membro_id)
                                            <option value="{{ $membro->id }}" selected> {{ $membro->id }} -
                                                {{ $membro->nome }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <br>
                            <button type="submit" class="btn btn-primary">Submeter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
