@extends('layouts.master')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header">
            Tipo de Utilizadores

            @if ($verification == null)
                @if (auth()->user()->tipoUser_id == 1)
                    <a href="{{ route('tipoUser.create') }}" class="float-right" style="margin-right:0.8rem"><img
                            src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Tipo de Utilizador"> </a>
                @endif
            @else
                @if (auth()->user()->tipoUser_id == 1)
                    <br>
                    Procurar por: <strong>{{ $verification }}</strong>
                    <a href="{{ route('tipoUser.create') }}" class="float-right" style="margin-right:0.8rem"><img
                            src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Tipo de Utilizador"> </a>
                @endif
            @endif

        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr style="text-align:center;">
                            <th scope="col">#</th>
                            <th scope="col">Nome:</th>
                            <th scope="col">Descrição:</th>

                            @if (auth()->user()->tipoUser_id == 1)
                                <th scope="col">Visualizar</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            @endif
                        </tr>
                    </thead>
                    <tfoot>
                        <tr style="text-align:center;">
                            <th scope="col">#</th>
                            <th scope="col">Nome:</th>
                            <th scope="col">Descrição:</th>
                            @if (auth()->user()->tipoUser_id == 1)
                                <th scope="col">Visualizar</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            @endif
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($tipoUsers as $tipoUser)
                            <tr style="text-align:center;">
                                <th scope="row">{{ $tipoUser->idTpUser }}</th>
                                <td>{{ $tipoUser->nome }}</td>
                                <td>{{ $tipoUser->descricao }}</td>
                                @if (auth()->user()->tipoUser_id == 1)
                                    <td><a href="{{ route('tipoUser.show', ['tipoUser' => $tipoUser->idTpUser]) }}"><img
                                                src="{{ asset('img/clube/visualizar.png') }}" alt="Visualizar"></a></td>
                                    <td> <a href="{{ route('tipoUser.edit', ['tipoUser' => $tipoUser->idTpUser]) }}"><img
                                                src="{{ asset('img/clube/editar.png') }}" alt="Editar"></a></td>
                                    <td>
                                        <form id="form_{{ $tipoUser->idTpUser }}"
                                            action="{{ route('tipoUser.destroy', ['tipoUser' => $tipoUser->idTpUser]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#"
                                                onclick="document.getElementById('form_{{ $tipoUser->idTpUser }}').submit()"><img
                                                    src="{{ asset('img/clube/eliminar.png') }}" alt="Eliminar"></a>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="{{ $tipoUsers->previousPageUrl() }}">Voltar</a></li>
                    @for ($i = 1; $i <= $tipoUsers->lastPage(); $i++)
                        <li class="page-item"><a class="page-link"
                                href="{{ $tipoUsers->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{ $tipoUsers->nextPageUrl() }}">Avançar</a></li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
