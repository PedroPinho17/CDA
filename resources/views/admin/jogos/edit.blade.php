@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Editar Jogo
                        <a href="{{ route('jogos.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>
                    <div class="card-body">
                        <form action=" {{ route('jogos.update', ['jogo' => $jogo->id_jogo]) }} " method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">ID</label>
                                <input type="text" class="form-control" name="id_jogo"
                                    value="{{ $jogo->id_jogo }}"="formGroupExampleInput" placeholder="Digite o id do jogo">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Equipa Visitante</label>
                                <input type="text" class="form-control" name="equipa_visitante"
                                    value="{{ $jogo->equipa_visitante }}" id="formGroupExampleInput"
                                    placeholder="Digite a equipa adversária">
                                {{ $errors->has('equipa_visitante') ? $errors->first('equipa_visitante') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Equipa Visitante</label>
                                <input type="text" class="form-control" name="resultado" value="{{ $jogo->resultado }}"
                                    id="formGroupExampleInput" placeholder="Digite o resultado do Jogo">
                                {{ $errors->has('resultado') ? $errors->first('resultado') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Data:</label>
                                <input type="text" class="form-control" name="data"
                                    value="{{ date('d-m-Y H:i:s', strtotime($jogo->data)) }}" id="formGroupExampleInput"
                                    placeholder="Digite a data do Jogo">
                                {{ $errors->has('data') ? $errors->first('data') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Link:</label>
                                <input type="text" class="form-control" name="link" value="{{ $jogo->link }}"
                                    id="formGroupExampleInput" placeholder="Digite o link">
                                {{ $errors->has('link') ? $errors->first('link') : '' }}
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Escolha a equipa que pertence</label>
                                <select class="form-select" aria-label="Default select example" name="equipa_id">
                                    <option>Utilizador</option>
                                    @foreach ($equipas as $equipa)
                                        @if ($equipa->id_equipa == $jogo->equipa_id)
                                            <option value="{{ $equipa->id_equipa }}" selected> {{ $equipa->id_equipa }}
                                                - {{ $equipa->nome }}</option>
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
