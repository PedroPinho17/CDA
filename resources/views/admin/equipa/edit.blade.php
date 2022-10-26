@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Editar Equipa
                        <a href="{{ route('equipa.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <form action=" {{ route('equipa.update', ['equipa' => $equipa->id_equipa]) }} " method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">ID:</label>
                                <input type="text" class="form-control" name="id_equipa "
                                    value="{{ $equipa->id_equipa }}" id="formGroupExampleInput"
                                    placeholder="Digite o Id da Equipa">
                                {{ $errors->has('id_equipa') ? $errors->first('id_equipa') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome" value="{{ $equipa->nome }}"
                                    id="formGroupExampleInput" placeholder="Digite o nome da equipa">
                                {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Tipo de Equipa:</label>
                                <input type="text" class="form-control" name="tipo_Equipa"
                                    value="{{ $equipa->tipo_Equipa }}" id="formGroupExampleInput"
                                    placeholder="Digite o tipo de Equipa">
                                {{ $errors->has('tipo_Equipa') ? $errors->first('tipo_Equipa') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Coloque a imagem do Post</label>
                                <input class="form-control" type="file" name="imagemEquipa" method id="formFile">
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Escolha o Escalão</label>
                                <select class="form-select" aria-label="Default select example" name="id_escalao">
                                    <option>Escalão:</option>
                                    @foreach ($escaloes as $escalao)
                                        @if ($escalao->id_escalao == $equipa->id_escalao)
                                            <option value="{{ $escalao->id_escalao }}" selected> {{ $escalao->id_escalao }}
                                                - {{ $escalao->nome_escalao }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Escolha a Equipa Técnica</label>
                                <select class="form-select" aria-label="Default select example" name="id_equipaTecnica">
                                    <option>Equipa técnica</option>
                                    @foreach ($equipaTec as $equipaTecnica)
                                        @if ($equipaTecnica->id_equipaTec == $equipa->id_equipaTecnica)
                                            <option value="{{ $equipaTecnica->id_equipaTec }}" selected>
                                                {{ $equipaTecnica->id_equipaTec }} - {{ $equipaTecnica->nome }}</option>
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
