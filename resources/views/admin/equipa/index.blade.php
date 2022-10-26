@extends('layouts.master')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            Equipa
            @if ($verification == null)
                <a href="{{ route('equipa.create') }}" class="float-right" style="margin-right:0.8rem"><img
                        src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Equipa"> </a>
                <a href="{{ route('equipa.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                    style="margin-right:0.8rem"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS"> </a>
                <a href="{{ route('equipa.exportar') }}" class="float-right" style="margin-right:0.8rem"><img
                        src="{{ asset('img/clube/Dompdf.png') }}" alt="DOMPDF"> </a>
            @else
                <br>
                Procurar por: <strong>{{ $verification }}</strong>
                <a href="{{ route('equipa.create') }}" class="float-right" style="margin-right:0.8rem"><img
                        src="{{ asset('img/clube/novo.png') }}" alt="Adicinar Equipa"> </a>
                <a href="{{ route('equipa.exportacao', ['extensao' => 'xlsx']) }}" class="float-right"
                    style="margin-right:0.8rem"><img src="{{ asset('img/clube/xls.png') }}" alt="XMLS"> </a>
                <a href="{{ route('equipa.exportar') }}" class="float-right" style="margin-right:0.8rem"><img
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
                            <th scope="col">Tipo de Equipa</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Escalão</th>
                            <th scope="col">Equipa Técnica</th>
                            <th scope="col">Visualizar</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome :</th>
                            <th scope="col">Tipo de Equipa</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Escalão</th>
                            <th scope="col">Equipa Técnica</th>
                            <th scope="col">Visualizar</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($equipas as $equipa)
                            <tr>
                                <th scope="row">{{ $equipa->id_equipa }}</th>
                                <td>{{ $equipa->nome }}</td>
                                @if ($equipa->tipo_Equipa == null || $equipa->tipo_Equipa == '')
                                    <td>Principal</td>
                                @else
                                    <td>{{ $equipa->tipo_Equipa }}</td>
                                @endif
                                <td><img style="width:6rem; height:6rem;"
                                        src="/storage/equipa/{{ $equipa->imagemEquipa }}"
                                        alt="{{ $equipa->imagemEquipa }}">
                                    <br>
                                    <span style="font-size:9pt;">{{ $equipa->imagemEquipa }}</span>
                                </td>
                                <td style="font-size:10pt;">{{ $equipa->id_escalao }} -
                                    {{ $equipa->escalao->nome_escalao }} </td>
                                <td style="font-size:10pt;">{{ $equipa->id_equipaTecnica }} -
                                    {{ $equipa->equipaTec->nome }} </td>

                                <td><a href="{{ route('equipa.show', ['equipa' => $equipa->id_equipa]) }}"><img
                                            src="{{ asset('img/clube/visualizar.png') }}" alt="Visualizar"></a></td>
                                <td> <a href="{{ route('equipa.edit', ['equipa' => $equipa->id_equipa]) }}"><img
                                            src="{{ asset('img/clube/editar.png') }}" alt="Editar"></a></td>
                                <td>
                                    <form id="form_{{ $equipa->id_equipa }}"
                                        action="{{ route('equipa.destroy', ['equipa' => $equipa->id_equipa]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $equipa->id_equipa }}').submit()"><img
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
                    <li class="page-item"><a class="page-link" href="{{ $equipas->previousPageUrl() }}">Voltar</a></li>
                    @for ($i = 1; $i <= $equipas->lastPage(); $i++)
                        <li class="page-item"><a class="page-link"
                                href="{{ $equipas->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{ $equipas->nextPageUrl() }}">Avançar</a></li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
