@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Adicionar Membro
                        <a href="{{ route('detalhe-membro.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <form action=" {{ route('detalhe-membro.store') }} " method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome_membro" id="formGroupExampleInput"
                                    placeholder="Digite o nome do membro">
                                {{ $errors->has('nome_membro') ? $errors->first('nome_membro') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Cargo:</label>
                                <input type="text" class="form-control" name="cargo" id="formGroupExampleInput"
                                    placeholder="Digite a função do membro">
                                {{ $errors->has('cargo') ? $errors->first('cargo') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Coloque a imagem do Membro</label>
                                <input class="form-control" type="file" name="foto" id="formFile">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Escolha o Cargo</label>
                                <select class="form-select" aria-label="Default select example" name="membro_id">
                                    <option selected>Cargos</option>
                                    @foreach ($membros as $membro)
                                        <option value="{{ $membro->id }}"> {{ $membro->id }} - {{ $membro->nome }}
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
