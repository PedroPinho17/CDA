@extends('layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            Equipa técnica
            @if ($verification == null)
                <a href="{{ route('equipaTec.create') }}" class="float-right" style="margin-right:0.8rem"><img
                        src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Equipa"> </a>
                <a href="{{ route('equipaTec.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                    style="margin-right:0.8rem"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS"> </a>
                <a href="{{ route('equipaTec.exportar') }}" class="float-right" style="margin-right:0.8rem"><img
                        src="{{ asset('img/clube/Dompdf.png') }}" alt="DOMPDF"> </a>
            @else
                <br>
                Procurar por: <strong>{{ $verification }}</strong>
                <a href="{{ route('equipaTec.create') }}" class="float-right" style="margin-right:0.8rem"><img
                        src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Equipa"> </a>
                <a href="{{ route('equipaTec.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                    style="margin-right:0.8rem"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS"> </a>
                <a href="{{ route('equipaTec.exportar') }}" class="float-right" style="margin-right:0.8rem"><img
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
                            <th scope="col">Nome :</th>
                            <th scope="col">Foto :</th>
                            <th scope="col">Visualizar</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome :</th>
                            <th scope="col">Foto :</th>
                            <th scope="col">Visualizar</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($equipaTecs as $equipaTec)
                            <tr>
                                <th scope="row">{{ $equipaTec->id_equipaTec }}</th>
                                <td>{{ $equipaTec->nome }}</td>
                                <td><img style="width:7.5rem; height:7.5rem;"
                                        src="/storage/fotos_equipa_tecnica/{{ $equipaTec->foto }}"
                                        alt="{{ $equipaTec->foto }}">
                                    <br>
                                    {{ $equipaTec->foto }}
                                </td>
                                <td><a href="{{ route('equipaTec.show', ['equipaTec' => $equipaTec->id_equipaTec]) }}"><img
                                            src="{{ asset('img/clube/visualizar.png') }}" alt="Visualizar"></a></td>
                                <td> <a href="{{ route('equipaTec.edit', ['equipaTec' => $equipaTec->id_equipaTec]) }}"><img
                                            src="{{ asset('img/clube/editar.png') }}" alt="Editar"></a></td>
                                <td>
                                    <form id="form_{{ $equipaTec->id_equipaTec }}"
                                        action="{{ route('equipaTec.destroy', ['equipaTec' => $equipaTec->id_equipaTec]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $equipaTec->id_equipaTec }}').submit()"><img
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
                    <li class="page-item"><a class="page-link" href="{{ $equipaTecs->previousPageUrl() }}">Voltar</a>
                    </li>
                    @for ($i = 1; $i <= $equipaTecs->lastPage(); $i++)
                        <li class="page-item"><a class="page-link"
                                href="{{ $equipaTecs->url($i) }}">{{ $i }}</a></li>
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{ $equipaTecs->nextPageUrl() }}">Avançar</a></li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
