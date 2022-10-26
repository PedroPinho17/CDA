@extends('layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            Jogadores
            @if ($verification == null)
                <a href="{{ route('jogadores.create') }}" class="float-right" style="margin-right:0.8rem"><img
                        src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Equipa"> </a>
                <a href="{{ route('jogadores.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                    style="margin-right:0.8rem"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS"> </a>
                <a href="{{ route('jogadores.exportar') }}" class="float-right" style="margin-right:0.8rem"><img
                        src="{{ asset('img/clube/Dompdf.png') }}" alt="DOMPDF"> </a>
            @else
                <br>
                Procurar por: <strong>{{ $verification }}</strong>
                <a href="{{ route('jogadores.create') }}" class="float-right" style="margin-right:0.8rem"><img
                        src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Equipa"> </a>
                <a href="{{ route('jogadores.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                    style="margin-right:0.8rem"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS"> </a>
                <a href="{{ route('jogadores.exportar') }}" class="float-right" style="margin-right:0.8rem"><img
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
                <table class="table table-striped table-hover">
                    <thead>
                        <tr style="text-align:center;">
                            <th scope="col">#</th>
                            <th scope="col">Nome:</th>
                            <th scope="col">Peso:</th>
                            <th scope="col">Altura:</th>
                            <th scope="col">Número Camisola:</th>
                            <th scope="col">Posição:</th>
                            <th scope="col">Foto:</th>
                            <th scope="col">Escalão:</th>
                            <th scope="col">Equipa:</th>
                            <th scope="col">Visualizar</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr style="text-align:center;">
                            <th scope="col">#</th>
                            <th scope="col">Nome:</th>
                            <th scope="col">Peso:</th>
                            <th scope="col">Altura:</th>
                            <th scope="col">Número Camisola:</th>
                            <th scope="col">Posição:</th>
                            <th scope="col">Foto:</th>
                            <th scope="col">Escalão:</th>
                            <th scope="col">Equipa:</th>
                            <th scope="col">Visualizar</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($jogadores as $key => $jogadore)
                            <tr style="text-align:center;">
                                <th scope="row">{{ $jogadore->id_jogador }}</th>
                                <td>{{ $jogadore->nome }}</td>
                                <td>{{ $jogadore->peso }}</td>
                                <td>{{ $jogadore->altura }}</td>
                                <td>{{ $jogadore->numero_camisola }}</td>
                                <td>{{ $jogadore->posicao }}</td>
                                <td>
                                    @if ($jogadore->id_escalao == 8 && $jogadore->id_equipa == 1)
                                        <img style="width:7.5rem; height=7.5rem;"
                                            src="/storage/jogadores/seniores/{{ $jogadore->foto }}"
                                            alt="{{ $jogadore->foto }}">
                                    @elseif ($jogadore->id_escalao == 7 && $jogadore->id_equipa == 2)
                                        <img style="width:7.5rem; height:7.5rem;"
                                            src="/storage/jogadores/juniores/{{ $jogadore->foto }}"
                                            alt="{{ $jogadore->foto }}">
                                    @endif
                                </td>
                                <td>{{ $jogadore->id_escalao }} - {{ $jogadore->escalao->nome_escalao }}</td>
                                <td>{{ $jogadore->id_equipa }} - {{ $jogadore->equipa->nome }}</td>
                                <td><a href="{{ route('jogadores.show', ['jogadore' => $jogadore->id_jogador]) }}"><img
                                            src="{{ asset('img/clube/visualizar.png') }}" alt="Visualizar"></a></td>
                                <td> <a href="{{ route('jogadores.edit', ['jogadore' => $jogadore->id_jogador]) }}"><img
                                            src="{{ asset('img/clube/editar.png') }}" alt="Editar"></a></td>
                                <td>
                                    <form id="form_{{ $jogadore->id_jogador }}"
                                        action="{{ route('jogadores.destroy', ['jogadore' => $jogadore->id_jogador]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $jogadore->id_jogador }}').submit()"><img
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
                    <li class="page-item"><a class="page-link" href="{{ $jogadores->previousPageUrl() }}">Voltar</a></li>
                    @for ($i = 1; $i <= $jogadores->lastPage(); $i++)
                        <li class="page-item"><a class="page-link"
                                href="{{ $jogadores->url($i) }}">{{ $i }}</a></li>
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{ $jogadores->nextPageUrl() }}">Avançar</a></li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
