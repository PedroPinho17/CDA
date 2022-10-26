@extends('layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            Membros
            @if ($verification == null)
                <a href="{{ route('detalhe-membro.create') }}" class="float-right" style="margin-right:0.8rem;"><img
                        src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Membro"> </a>
                <a href="{{ route('detalhe-membro.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                    style="margin-right:0.8rem;"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS"> </a>
                <a href="{{ route('detalhe-membro.exportar') }}" class="float-right" style="margin-right:0.8rem;"><img
                        src="{{ asset('img/clube/Dompdf.png') }}" alt="DOMPDF"> </a>
            @else
                <br>
                Procurar por: <strong>{{ $verification }}</strong>
                <a href="{{ route('detalhe-membro.create') }}" class="float-right" style="margin-right:0.8rem;"><img
                        src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Membro"> </a>
                <a href="{{ route('detalhe-membro.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                    style="margin-right:0.8rem;"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS"> </a>
                <a href="{{ route('detalhe-membro.exportar') }}" class="float-right" style="margin-right:0.8rem;"><img
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
                            <th scope="col">Nome do Membro :</th>
                            <th scope="col">Função:</th>
                            <th scope="col">Foto :</th>
                            <th scope="col"> # - Cargo </th>
                            <th scope="col">Visualizar</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome do Membro :</th>
                            <th scope="col">Função:</th>
                            <th scope="col">Foto :</th>
                            <th scope="col"> # - Cargo </th>
                            <th scope="col">Visualizar</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($detalhes_membros as $detalhe_membro)
                            <tr style="text-align: center;">
                                <th scope="row">{{ $detalhe_membro->id_detalhe_membro }}</th>
                                <td>{{ $detalhe_membro->nome_membro }}</td>
                                <td>{{ $detalhe_membro->cargo }}</td>
                                <td><img style="width:7.5rem; height:7.5rem;"
                                        src="/storage/Membros/{{ $detalhe_membro->foto }}"
                                        alt="{{ $detalhe_membro->foto }}">
                                    <br>
                                    {{ $detalhe_membro->foto }}
                                </td>

                                <td>{{ $detalhe_membro->membro_id }} - {{ $detalhe_membro->membro->nome }}</td>
                                <td><a
                                        href="{{ route('detalhe-membro.show', ['detalhe_membro' => $detalhe_membro->id_detalhe_membro]) }}"><img
                                            src="{{ asset('img/clube/visualizar.png') }}" alt="Visualizar"></a></td>
                                <td> <a
                                        href="{{ route('detalhe-membro.edit', ['detalhe_membro' => $detalhe_membro->id_detalhe_membro]) }}"><img
                                            src="{{ asset('img/clube/editar.png') }}" alt="Editar"></a></a></td>
                                <td>
                                    <form id="form_{{ $detalhe_membro->id_detalhe_membro }}"
                                        action="{{ route('detalhe-membro.destroy', ['detalhe_membro' => $detalhe_membro->id_detalhe_membro]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $detalhe_membro->id_detalhe_membro }}').submit()"><img
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
                            href="{{ $detalhes_membros->previousPageUrl() }}">Voltar</a>
                    </li>
                    @for ($i = 1; $i <= $detalhes_membros->lastPage(); $i++)
                        <li class="page-item"><a class="page-link"
                                href="{{ $detalhes_membros->url($i) }}">{{ $i }}</a></li>
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{ $detalhes_membros->nextPageUrl() }}">Avançar</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
