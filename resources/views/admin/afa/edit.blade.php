@extends('layouts.master')

@section('content')
    <div class="container" style="max-width:150rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Editar Link
                        <a href="{{ route('afa.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                    </div>

                    <div class="card-body">
                        <form action=" {{ route('afa.update', ['afa' => $afa->id]) }} " method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">ID</label>
                                <input type="text" class="form-control" name="id"
                                    value="{{ $afa->id }}"="formGroupExampleInput" placeholder="Digite o id do Link">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Link</label>
                                <input type="text" class="form-control" name="link" value="{{ $afa->link }}"
                                    id="formGroupExampleInput" placeholder="Digite o Link">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Escolha a Equipa</label>
                                <select class="form-select" aria-label="Default select example" name="equipa_id">
                                    <option>Equipa</option>
                                    @foreach ($equipas as $equipa)
                                        @if ($equipa->id_equipa == $afa->equipa_id)
                                            <option value="{{ $equipa->id_equipa }}" selected> {{ $equipa->id_equipa }}
                                                -
                                                {{ $equipa->nome }}</option>
                                        @else
                                            <option value="{{ $equipa->id_equipa }}"> {{ $equipa->id_equipa }} -
                                                {{ $equipa->nome }}</option>
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
