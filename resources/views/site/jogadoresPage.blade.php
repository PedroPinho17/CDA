@extends('site.layouts.default')
@section('titulo', $titulo)
@section('conteudo')
    <!--Main-->
    <div class="player">
        <h3 class="title">{{ $jogadores[0]->escalao->nome_escalao }}</h3>
        <picture>
            <img src="/storage/equipa/{{ $jogadores[0]->equipa->imagemEquipa }}"
                alt="{{ $jogadores[0]->escalao->nome_escalao }}">
        </picture>
        <div class="card-container">
            @foreach ($jogadores as $jogador)
                <div class="card-2">
                    <!--Card-2-->
                    <div class="card-image-2">
                        @if ($jogador->id_escalao == 8 && $jogador->id_equipa == 1)
                            <img src="/storage/jogadores/seniores/{{ $jogador->foto }}" alt="{{ $jogador->nome }}">
                        @elseif ($jogador->id_escalao == 7 && $jogador->id_equipa == 2)
                            <img src="/storage/jogadores/juniores/{{ $jogador->foto }}" alt="{{ $jogador->nome }}">
                        @endif
                    </div>
                    <div class="card-text-2">
                        <span class="text-info"> <strong> {{ $jogador->posicao }} </strong> / {{ $jogador->altura }}cm /
                            {{ $jogador->peso }}Kg</span>
                        <p class="number-name"> <span class="text-number"
                                style="text-shadow: #000 0.1em 0.1em 0.2em;">{{ $jogador->numero_camisola }}</span>
                            {{ $jogador->nome }} </p>
                        <p class="elemento"> <strong> Pertence: </strong> {{ $jogador->escalao->nome_escalao }} </p>
                        <!--<p> lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>-->
                        <div style="margin-left:21rem; margin-top:-4rem;">
                            @if ($jogador->id_escalao == 8 && $jogador->id_equipa == 1)
                                <a href="{{ route('jogador.show', ['jogador' => $jogador->id_jogador]) }}"><i
                                        class="fa-solid fa-circle-plus" style="color:#f2b705; font-size:2rem;"></i></a>
                            @elseif ($jogador->id_escalao == 7 && $jogador->id_equipa == 2)
                                <a href="{{ route('jogador.show', ['jogador' => $jogador->id_jogador]) }}"><i
                                        class="fa-solid fa-circle-plus" style="color:#f2b705; font-size:2rem;"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
                <!--End of Card-2-->
            @endforeach
        </div>
        <h3 class="title-2">Resultados</h3>
        <div class="reponsive">
            <table class="rTable">
                <thead>
                    <tr style="background-color: #144D29;
                            color: #fff;">
                        <th>Equipa Adversária:</th>
                        <th>Resultado</th>
                        <th>Data:</th>
                        <th>Saber Mais:</th>
                    </tr>
                </thead>
                <tfoot style="background-color: #144D29;
                        color: #fff;">
                    <tr>
                        <th>Equipa Adversária:</th>
                        <th>Resultado</th>
                        <th>Data:</th>
                        <th>Saber Mais:</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($jogos as $jogo)
                        <tr style="text-align:center;">
                            <td>{{ $jogo->equipa_visitante }}</td>
                            <td>{{ $jogo->resultado }}</td>
                            <td>{{ date('d-m-Y H:i:s', strtotime($jogo->data)) }}</td>
                            @if ($jogo->link == null)
                                <td>Ainda não Dispoível</td>
                            @elseif($jogo->link != null)
                                <td><a href="{{ $jogo->link }} " target="_blank"><i class="fa-solid fa-circle-plus"
                                            style="color:#f2b705; font-size:2rem;"></i></a></td>
                            @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--End main-->
    <div style="font-size:18pt; margin: 0 auto; text-align: center;">
        <a href="{{ $link[0]->link }}" target="_blank" class="link-btn">SABER MAIS</a>
    </div>
@endsection
