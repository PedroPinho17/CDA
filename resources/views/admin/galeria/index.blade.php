@extends('layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            Fotografias
            <a href="{{ route('galeria.create') }}" class="float-right" style="margin-right:0.8rem;"><img
                    src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Post"> </a>
            <a href="{{ route('galeria.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                style="margin-right:0.8rem;"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS"> </a>
            <a href="{{ route('galeria.exportar') }}" class="float-right" style="margin-right:0.8rem;"><img
                    src="{{ asset('img/clube/Dompdf.png') }}" alt="DOMPDF"> </a>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped table-hover" style="text-align: center;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titulo:</th>
                            <th scope="col">Descrição:</th>
                            <th scope="col">Foto:</th>
                            <th scope="col">Visualizar</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titulo:</th>
                            <th scope="col">Descrição:</th>
                            <th scope="col">Foto:</th>
                            <th scope="col">Visualizar</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                        <tbody>
                            @foreach ($galerias as $galerium)
                                <tr>
                                    <th scope="row">{{ $galerium->id }}</th>
                                    <td>{{ $galerium->titulo }}</td>
                                    <td>{{ $galerium->descricao }}</td>
                                    <td><img style="width:7.5rem; height:7.5rem;"
                                            src="/storage/galeria/{{ $galerium->foto }}" alt="{{ $galerium->foto }}">
                                        <br>
                                        {{ $galerium->foto }}
                                    </td>
                                    <td><a href="{{ route('galeria.show', ['galerium' => $galerium->id]) }}"><img
                                                src="{{ asset('img/clube/visualizar.png') }}" alt="Visualizar"></a></td>
                                    <td> <a href="{{ route('galeria.edit', ['galerium' => $galerium->id]) }}"><img
                                                src="{{ asset('img/clube/editar.png') }}" alt="Editar"></a></td>
                                    <td>
                                        <form id="form_{{ $galerium->id }}"
                                            action="{{ route('galeria.destroy', ['galerium' => $galerium->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#"
                                                onclick="document.getElementById('form_{{ $galerium->id }}').submit()"><img
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
                    <li class="page-item"><a class="page-link" href="{{ $galerias->previousPageUrl() }}">Voltar</a></li>
                    @for ($i = 1; $i <= $galerias->lastPage(); $i++)
                        <li class="page-item"><a class="page-link"
                                href="{{ $galerias->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{ $galerias->nextPageUrl() }}">Avançar</a></li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
