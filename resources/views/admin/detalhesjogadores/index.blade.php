@extends('layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            Detalhes dos Jogadores
            @if ($verification == null)
                <a href="{{ route('detalhes_jogadores.create') }}" class="float-right" style="margin-right:0.8rem;"><img
                        src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Post"> </a>
                <a href="{{ route('detalhes_jogadores.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                    style="margin-right:0.8rem;"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS"> </a>
                <a href="{{ route('detalhes_jogadores.exportar') }}" class="float-right" style="margin-right:0.8rem;"><img
                        src="{{ asset('img/clube/Dompdf.png') }}" alt="DOMPDF"> </a>
            @else
                <br>
                Procurar por: <strong>{{ $verification }}</strong>
                <a href="{{ route('detalhes_jogadores.create') }}" class="float-right" style="margin-right:0.8rem;"><img
                        src="{{ asset('img/clube/novo.png') }}" alt="Adicinar DEtalhe"> </a>
                <a href="{{ route('detalhes_jogadores.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                    style="margin-right:0.8rem;"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS"> </a>
                <a href="{{ route('detalhes_jogadores.exportar') }}" class="float-right"
                    style="margin-right:0.8rem;"><img src="{{ asset('img/clube/Dompdf.png') }}" alt="DOMPDF"> </a>
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
                        <th>ID</th>
                        <th>Nome Completo</th>
                        <th>Data de Nascimento</th>
                        <th>Naturalidade</th>
                        <th>Info</th>
                        <th>Link</th>
                        <th>ID - Jogador</th>
                        <th>Visualizar</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tfoot>
                        <th>ID</th>
                        <th>Nome Completo</th>
                        <th>Data de Nascimento</th>
                        <th>Naturalidade</th>
                        <th>Info</th>
                        <th>Link</th>
                        <th>ID - Jogador</th>
                        <th>Visualizar</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tfoot>
                    <tbody>
                        @foreach ($detalhesJogadores as $detalhes_jogadore)
                            <tr>
                                <td>{{ $detalhes_jogadore->id }}</td>
                                <td>{{ $detalhes_jogadore->nome_completo }}</td>
                                <td>{{ $detalhes_jogadore->data_nascimento }}</td>
                                <td>{{ $detalhes_jogadore->Naturalidade }}</td>
                                <td>{{ $detalhes_jogadore->info }}</td>
                                <td>{{ $detalhes_jogadore->link }}</td>
                                <td>{{ $detalhes_jogadore->jogador_id }} - {{ $detalhes_jogadore->jogador->nome }}
                                </td>
                                <td style="text-align: center;"><a
                                        href="{{ route('detalhes_jogadores.show', ['detalhes_jogadore' => $detalhes_jogadore->id]) }}"><img
                                            src="{{ asset('img/clube/visualizar.png') }}" alt="Visualizar"></a></td>
                                <td style="text-align: center;"><a
                                        href="{{ route('detalhes_jogadores.edit', ['detalhes_jogadore' => $detalhes_jogadore->id]) }}"><img
                                            src="{{ asset('img/clube/editar.png') }}" alt="Editar"></a></td>
                                <td>
                                    <form id="form_{{ $detalhes_jogadore->id }}"
                                        action="{{ route('detalhes_jogadores.destroy', ['detalhes_jogadore' => $detalhes_jogadore->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $detalhes_jogadore->id }}').submit()"><img
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
                    <li class="page-item"><a class="page-link"
                            href="{{ $detalhesJogadores->previousPageUrl() }}">Voltar</a></li>
                    @for ($i = 1; $i <= $detalhesJogadores->lastPage(); $i++)
                        <li class="page-item"><a class="page-link"
                                href="{{ $detalhesJogadores->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{ $detalhesJogadores->nextPageUrl() }}">Avançar</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
