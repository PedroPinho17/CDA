@extends('layouts.master')
@section('content')
    @if (auth()->user()->id == 12)
        <div class="container" style="max-width:150rem;">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Adicionar Tarefa
                            <a href="{{ route('task.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                    src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('task.store') }}" method="post" enctype="multipart/form">
                                @csrf
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Tarefa:</label>
                                    <input type="text" class="form-control" name="texto" id="formGroupExampleInput"
                                        placeholder="Digite a tarefa">
                                    {{ $errors->has('texto') ? $errors->first('texto') : '' }}
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Escolha o Utilizador</label>
                                    <select class="form-select" aria-label="Default select example" name="user_id">
                                        <option selected>Utilizadores</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"> {{ $user->id }} - {{ $user->name }}
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
    @else
        @include('common.erro')
    @endif
@endsection
