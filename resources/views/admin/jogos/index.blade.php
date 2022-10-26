@extends('layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            Jogos
            @if ($verification == null)
                <a href="{{ route('jogos.create') }}" class="float-right" style="margin-right:0.8rem"><img
                        src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Escalão"> </a>
                <a href="{{ route('jogos.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                    style="margin-right:0.8rem"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS"> </a>
                <a href="{{ route('jogos.exportar') }}" class="float-right" style="margin-right:0.8rem"><img
                        src="{{ asset('img/clube/Dompdf.png') }}" alt="DOMPDF"> </a>
            @else
                <br>
                Procurar por: <strong>{{ $verification }}</strong>
                <a href="{{ route('jogos.create') }}" class="float-right" style="margin-right:0.8rem"><img
                        src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Escalão"> </a>
                <a href="{{ route('jogos.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                    style="margin-right:0.8rem"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS"> </a>
                <a href="{{ route('jogos.exportar') }}" class="float-right" style="margin-right:0.8rem"><img
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
                            <th scope="col">Equipa adversária:</th>
                            <th scope="col">Resultado:</th>
                            <th scope="col">Data:</th>
                            <th scope="col">Link:</th>
                            <th scope="col">Equipa:</th>
                            <th scope="col">Visualizar</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Equipa adversária:</th>
                            <th scope="col">Resultado:</th>
                            <th scope="col">Data:</th>
                            <th scope="col">Link:</th>
                            <th scope="col">Equipa:</th>
                            <th scope="col">Visualizar</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($jogos as $jogo)
                            <tr>
                                <th scope="row">{{ $jogo->id_jogo }}</th>
                                <td>{{ $jogo->equipa_visitante }}</td>
                                <td>{{ $jogo->resultado }}</td>
                                <td>{{ date('d-m-Y H:i:s', strtotime($jogo->data)) }}</td>
                                <td>{{ $jogo->link }}</td>
                                <td>{{ $jogo->equipa->nome }}</td>
                                <td><a href="{{ route('jogos.show', ['jogo' => $jogo->id_jogo]) }}"><img
                                            src="{{ asset('img/clube/visualizar.png') }}" alt="Visualizar"></a></td>
                                <td> <a href="{{ route('jogos.edit', ['jogo' => $jogo->id_jogo]) }}"><img
                                            src="{{ asset('img/clube/editar.png') }}" alt="Editar"></a></td>
                                <td>
                                    <form id="form_{{ $jogo->id_jogo }}"
                                        action="{{ route('jogos.destroy', ['jogo' => $jogo->id_jogo]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $jogo->id_jogo }}').submit()"><img
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
                    <li class="page-item"><a class="page-link" href="{{ $jogos->previousPageUrl() }}">Voltar</a></li>
                    @for ($i = 1; $i <= $jogos->lastPage(); $i++)
                        <li class="page-item"><a class="page-link" href="{{ $jogos->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{ $jogos->nextPageUrl() }}">Avançar</a></li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
