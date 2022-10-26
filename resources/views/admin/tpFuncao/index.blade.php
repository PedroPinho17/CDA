@extends('layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            Detalhes da Equipa Técnica
            @if ($verification == null)
                <a href="{{ route('tpFuncao-equipaTec.create') }}" class="float-right" style="margin-right:0.8rem"><img
                        src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Equipa"> </a>
                <a href="{{ route('tpFuncao-equipaTec.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                    style="margin-right:0.8rem"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS"> </a>
                <a href="{{ route('tpFuncao-equipaTec.exportar') }}" class="float-right" style="margin-right:0.8rem"><img
                        src="{{ asset('img/clube/Dompdf.png') }}" alt="DOMPDF"> </a>
            @else
                <br>
                Procurar por: <strong>{{ $verification }}</strong>
                <a href="{{ route('tpFuncao-equipaTec.create') }}" class="float-right" style="margin-right:0.8rem"><img
                        src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Equipa"> </a>
                <a href="{{ route('tpFuncao-equipaTec.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                    style="margin-right:0.8rem"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS"> </a>
                <a href="{{ route('tpFuncao-equipaTec.exportar') }}" class="float-right" style="margin-right:0.8rem"><img
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
                            <th scope="col">Nome Treinador:</th>
                            <th scope="col">Função:</th>
                            <th scope="col">Foto:</th>
                            <th scope="col">Equipa:</th>
                            <th scope="col">Visualizar</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome Treinador:</th>
                            <th scope="col">Função:</th>
                            <th scope="col">Foto:</th>
                            <th scope="col">Equipa:</th>
                            <th scope="col">Visualizar</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($tpFuncoes as $key => $tpFuncao_equipaTec)
                            <tr>
                                <th scope="row">{{ $tpFuncao_equipaTec->id }}</th>
                                <td>{{ $tpFuncao_equipaTec->nome_treinador }}</td>
                                <td>{{ $tpFuncao_equipaTec->funcao }}</td>
                                <td>
                                    @if ($tpFuncao_equipaTec->id_equipaTec == 1)
                                        <img style="width:7.5rem; height:7.5rem;"
                                            src="/storage/treinadores/seniores/{{ $tpFuncao_equipaTec->foto_treinador }}"
                                            alt="{{ $tpFuncao_equipaTec->foto_treinador }}">
                                        <br>
                                        {{ $tpFuncao_equipaTec->foto_treinador }}
                                    @elseif ($tpFuncao_equipaTec->id_equipaTec == 2)
                                        <img style="width:7.5rem; height:7.5rem;"
                                            src="/storage/treinadores/juniores/{{ $tpFuncao_equipaTec->foto_treinador }}"
                                            alt="{{ $tpFuncao_equipaTec->foto_treinador }}">
                                        <br>
                                        {{ $tpFuncao_equipaTec->foto_treinador }}
                                    @elseif ($tpFuncao_equipaTec->id_equipaTec == 3)
                                        <img style="width:7.5rem; height:7.5rem;"
                                            src="/storage/treinadores/juvenis/{{ $tpFuncao_equipaTec->foto_treinador }}"
                                            alt="{{ $tpFuncao_equipaTec->foto_treinador }}">
                                        <br>
                                        {{ $tpFuncao_equipaTec->foto_treinador }}
                                    @endif
                                </td>
                                <td>{{ $tpFuncao_equipaTec->id_equipaTec }} -
                                    {{ $tpFuncao_equipaTec->equipaTecnica->nome }}</td>
                                <td><a
                                        href="{{ route('tpFuncao-equipaTec.show', ['tpFuncao_equipaTec' => $tpFuncao_equipaTec->id]) }}"><img
                                            src="{{ asset('img/clube/visualizar.png') }}" alt="Visualizar"></a></td>
                                <td> <a
                                        href="{{ route('tpFuncao-equipaTec.edit', ['tpFuncao_equipaTec' => $tpFuncao_equipaTec->id]) }}"><img
                                            src="{{ asset('img/clube/editar.png') }}" alt="Editar"></a></td>
                                <td>
                                    <form id="form_{{ $tpFuncao_equipaTec->id }}"
                                        action="{{ route('tpFuncao-equipaTec.destroy', ['tpFuncao_equipaTec' => $tpFuncao_equipaTec->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $tpFuncao_equipaTec->id }}').submit()"><img
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
                    <li class="page-item"><a class="page-link" href="{{ $tpFuncoes->previousPageUrl() }}">Voltar</a></li>
                    @for ($i = 1; $i <= $tpFuncoes->lastPage(); $i++)
                        <li class="page-item"><a class="page-link"
                                href="{{ $tpFuncoes->url($i) }}">{{ $i }}</a></li>
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{ $tpFuncoes->nextPageUrl() }}">Avançar</a></li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
