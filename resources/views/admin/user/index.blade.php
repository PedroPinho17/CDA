@extends('layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            Utilizadores
            @if ($verification == null)
                @if (auth()->user()->tipoUser_id == 1)
                    <a href="{{ route('user.create') }}" class="float-right" style="margin-right:0.8rem;"><img
                            src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Utilizador"> </a>
                @endif
                <a href="{{ route('user.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                    style="margin-right:0.8rem;"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS"> </a>
                <a href="{{ route('user.exportar') }}" class="float-right" style="margin-right:0.8rem;"><img
                        src="{{ asset('img/clube/Dompdf.png') }}" alt="DOMPDF"> </a>
            @else
                <br>
                Procurar por: <strong>{{ $verification }}</strong>
                @if (auth()->user()->tipoUser_id == 1)
                    <a href="{{ route('user.create') }}" class="float-right" style="margin-right:0.8rem;"><img
                            src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Utilizador"> </a>
                @endif
                <a href="{{ route('user.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                    style="margin-right:0.8rem;"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS"> </a>
                <a href="{{ route('user.exportar') }}" class="float-right" style="margin-right:0.8rem;"><img
                        src="{{ asset('img/clube/Dompdf.png') }}" alt="DOMPDF"> </a>
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
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Rede</th>
                            <th>Tipo de Utilizador</th>
                            <th>Verificado</th>
                            <th>Status</th>
                            <th>Visualizar</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Rede</th>
                            <th>Tipo de Utilizador</th>
                            <th>Verificado</th>
                            <th>Status</th>
                            <th>Visualizar</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
                            <tr style="text-align: center; vertical-align: middle;">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                @if ($user->rede == null)
                                    <td>Ainda não inseriu a sua rede social</td>
                                @else
                                    <td><a href="{{ $user->rede }}" target="_blank">{{ $user->rede }}</a> </td>
                                @endif

                                <td>{{ $user->tp->nome }}</td>

                                @if ($user->email_verified_at == null)
                                    <td><img src="{{ asset('img/clube/close.png') }}" alt="Close"></td>
                                @else
                                    <td> <img src="{{ asset('img/clube/feito.png') }}" alt="Check"></td>
                                @endif

                                @if ($user->isOnline($user->id))
                                    <td class="text-success">
                                            Online
                                    </td>
                                @else
                                    <td class="text-muted">
                                            Offline
                                    </td>
                                @endif

                                @if (Auth::user()->tipoUser_id == 1)
                                    <td><a href="{{ route('user.show', ['user' => $user->id]) }}"><img
                                                src="{{ asset('img/clube/visualizar.png') }}" alt="Visualizar"></a></td>
                                    <td> <a href="{{ route('user.edit', ['user' => $user->id]) }}"><img
                                                src="{{ asset('img/clube/editar.png') }}" alt="Editar"></a></td>
                                    <td>
                                        <form id="form_{{ $user->id }}"
                                            action="{{ route('user.destroy', ['user' => $user->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#"
                                                onclick="document.getElementById('form_{{ $user->id }}').submit()"><img
                                                    src="{{ asset('img/clube/eliminar.png') }}" alt="Eliminar"></a>
                                        </form>
                                    </td>
                                @elseif (Auth::user()->email == $user->email)
                                    <td><a href="{{ route('user.show', ['user' => $user->id]) }}"><img
                                                src="{{ asset('img/clube/visualizar.png') }}" alt="Visualizar"></a></td>
                                    <td> <a href="{{ route('user.edit', ['user' => $user->id]) }}"><img
                                                src="{{ asset('img/clube/editar.png') }}" alt="Editar"></a></td>
                                    <td>
                                        <form id="form_{{ $user->id }}"
                                            action="{{ route('user.destroy', ['user' => $user->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#"
                                                onclick="document.getElementById('form_{{ $user->id }}').submit()"><img
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
                    <li class="page-item"><a class="page-link" href="{{ $users->previousPageUrl() }}">Voltar</a></li>
                    @for ($i = 1; $i <= $users->lastPage(); $i++)
                        <li class="page-item"><a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{ $users->nextPageUrl() }}">Avançar</a></li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
