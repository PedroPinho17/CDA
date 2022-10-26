@extends('layouts.master')
@section('content')
    @if (auth()->user()->tipoUser_id  == 1)
        <div class="card shadow mb-4">
            <div class="card-header">
                Tarefas
                @if ($verification == null)
                    <a href="{{ route('task.create') }}" class="float-right" style="margin-right:0.8rem;"><img
                            src="{{ asset('img/clube/novo.png') }}" alt="Adicinar task"> </a>
                @else
                    <br>
                    Procurar por: <strong>{{ $verification }}</strong>
                    <a href="{{ route('task.create') }}" class="float-right" style="margin-right:0.8rem;"><img
                            src="{{ asset('img/clube/novo.png') }}" alt="Adicinar task"> </a>
                @endif
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped table-hover" style="text-align:center;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tarefa</th>
                                <th>User ID - Nome </th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Tarefa</th>
                                <th>User ID - Nome </th>
                                <th>Editar</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr style="text-align: center;">
                                    <td>{{ $task->id }}</td>
                                    <td>{{ $task->texto }}</td>
                                    <td>{{ $task->user_id }} - {{ $task->user->name }}</td>
                                    <!--<td style="text-align: center;"><a href="{{ route('task.show', ['task' => $task->id]) }}"><img src="{{ asset('img/clube/visualizar.png') }}" alt="Visualizar"></a></td>-->
                                    <td style="text-align: center;"><a
                                            href="{{ route('task.edit', ['task' => $task->id]) }}"><img
                                                src="{{ asset('img/clube/editar.png') }}" alt="Editar"></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="{{ $tasks->previousPageUrl() }}">Voltar</a></li>
                        @for ($i = 1; $i <= $tasks->lastPage(); $i++)
                            <li class="page-item"><a class="page-link"
                                    href="{{ $tasks->url($i) }}">{{ $i }}</a></li>
                        @endfor
                        <li class="page-item"><a class="page-link" href="{{ $tasks->nextPageUrl() }}">Avançar</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    @else
        @include('common.erro')
    @endif
@endsection
