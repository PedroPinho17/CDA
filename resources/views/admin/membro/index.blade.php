@extends('layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            Cargos
            @if ($verification == null)
                <a href="{{ route('membro.create') }}" class="float-right" style="margin-right:0.8rem;"><img
                        src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Cargo"></a>
                <a href="{{ route('membro.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                    style="margin-right:0.8rem;"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS"> </a>
                <a href="{{ route('membro.exportar') }}" class="float-right" style="margin-right:0.8rem;"><img
                        src="{{ asset('img/clube/Dompdf.png') }}" alt="DOMPDF"> </a>
            @else
                <br>
                Procurar por: <strong>{{ $verification }}</strong>
                <a href="{{ route('membro.create') }}" class="float-right" style="margin-right:0.8rem;"><img
                        src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Cargo"></a>
                <a href="{{ route('membro.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                    style="margin-right:0.8rem;"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS"> </a>
                <a href="{{ route('membro.exportar') }}" class="float-right" style="margin-right:0.8rem;"><img
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
                            <th scope="col">#</th>
                            <th scope="col">Nome:</th>
                            <th scope="col">Visualizar</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome:</th>
                            <th scope="col">Visualizar</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($membros as $membro)
                            <tr style="text-align: center;">
                                <th scope="row">{{ $membro->id }}</th>
                                <td>{{ $membro->nome }}</td>
                                <td><a href="{{ route('membro.show', ['membro' => $membro->id]) }}"><img
                                            src="{{ asset('img/clube/visualizar.png') }}" alt="Visualizar"></a></td>
                                <td> <a href="{{ route('membro.edit', ['membro' => $membro->id]) }}"><img
                                            src="{{ asset('img/clube/editar.png') }}" alt="Editar"></a></td>
                                <td>
                                    <form id="form_{{ $membro->id }}"
                                        action="{{ route('membro.destroy', ['membro' => $membro->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $membro->id }}').submit()"><img
                                                src="{{ asset('img/clube/eliminar.png') }}" alt="Eliminar"></a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="{{ $membros->previousPageUrl() }}">Voltar</a></li>
                    @for ($i = 1; $i <= $membros->lastPage(); $i++)
                        <li class="page-item"><a class="page-link"
                                href="{{ $membros->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{ $membros->nextPageUrl() }}">Avançar</a></li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
