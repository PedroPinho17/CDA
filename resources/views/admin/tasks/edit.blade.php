@extends('layouts.master')
@section('content')
    @if (auth()->user()->id == 12)
        <div class="container" style="max-width:150rem;">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Editar Tarefa
                            <a href="{{ route('task.index') }}" class="float-right" style="margin-right:0.8rem"><img
                                    src="{{ asset('img/clube/voltar.png') }}" alt="Voltar"></a>
                        </div>
                        <div class="card-body">
                            <form action=" {{ route('task.update', ['task' => $task->id]) }} " method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">ID</label>
                                    <input type="text" class="form-control" name="id"
                                        value="{{ $task->id }}"="formGroupExampleInput"
                                        placeholder="Digite o id da terefa">
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Nome</label>
                                    <input type="text" class="form-control" name="texto" value="{{ $task->texto }}"
                                        id="formGroupExampleInput" placeholder="Digite o Texto">
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Escolha o Utilizador</label>
                                    <select class="form-select" aria-label="Default select example" name="user_id">
                                        <option style="text-align:center;">Utilizador</option>
                                        @foreach ($users as $user)
                                            @if ($user->id == $task->user_id)
                                                <option value="{{ $user->id }}" selected> {{ $user->id }} -
                                                    {{ $user->name }}</option>
                                            @else
                                                <option value="{{ $user->id }}"> {{ $user->id }} -
                                                    {{ $user->name }}</option>
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
    @else
        @include('common.erro')
    @endif
@endsection
