@extends('layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            Links
            @if ($verification == null)
                <a href="{{ route('afa.create') }}" class="float-right" style="margin-right:0.8rem"><img
                        src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Escalão"> </a>
                <a href="{{ route('afa.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                    style="margin-right:0.8rem"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS"> </a>
                <a href="{{ route('afa.exportar') }}" class="float-right" style="margin-right:0.8rem"><img
                        src="{{ asset('img/clube/Dompdf.png') }}" alt="DOMPDF"> </a>
            @else
                <br>
                Procurar por: <strong>{{ $verification }}</strong>
                <a href="{{ route('afa.create') }}" class="float-right" style="margin-right:0.8rem"><img
                        src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Escalão"> </a>
                <a href="{{ route('afa.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                    style="margin-right:0.8rem"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS"> </a>
                <a href="{{ route('afa.exportar') }}" class="float-right" style="margin-right:0.8rem"><img
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
                            <th scope="col">Link</th>
                            <th scope="col">Equipa:</th>
                            <th scope="col">Visualizar</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Link</th>
                            <th scope="col">Equipa:</th>
                            <th scope="col">Visualizar</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($afas as $afa)
                            <tr>
                                <th scope="row">{{ $afa->id }}</th>
                                <td><a href="{{ $afa->link }}" target="_blank">{{ $afa->link }}</a></td>
                                <td>{{ $afa->equipa->nome }}</td>
                                <td><a href="{{ route('afa.show', ['afa' => $afa->id]) }}"><img
                                            src="{{ asset('img/clube/visualizar.png') }}" alt="Visualizar"></a></td>
                                <td> <a href="{{ route('afa.edit', ['afa' => $afa->id]) }}"><img
                                            src="{{ asset('img/clube/editar.png') }}" alt="Editar"></a></td>
                                <td>
                                    <form id="form_{{ $afa->id }}"
                                        action="{{ route('afa.destroy', ['afa' => $afa->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $afa->id }}').submit()"><img
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
                    <li class="page-item"><a class="page-link" href="{{ $afas->previousPageUrl() }}">Voltar</a></li>
                    @for ($i = 1; $i <= $afas->lastPage(); $i++)
                        <li class="page-item"><a class="page-link" href="{{ $afas->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{ $afas->nextPageUrl() }}">Avançar</a></li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
