<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CD Arrifanense - {{ $jogador->nome }} </title>
    <link rel="shortcut icon" href="{{ asset('img/clube/logo_arrifana.png') }}" type="image/x-icon">



    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/page_detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

</head>

<body>
    @include('site.layouts._partials.menu')

    <div class="start-detail">
        <div class="wrapper">
            <div class="left">
                @if ($jogador->id_escalao == 8 && $jogador->id_equipa == 1)
                    <img src="/storage/jogadores/seniores/{{ $jogador->foto }}" alt="{{ $jogador->nome }}"
                        width="200">
                @elseif ($jogador->id_escalao == 7 && $jogador->id_equipa == 2)
                    <img src="/storage/jogadores/juniores/{{ $jogador->foto }}" alt="{{ $jogador->nome }}"
                        width="200">
                @endif
                <h4>{{ $jogador->nome }}</h4>
                <span class="text-number"
                    style="font-size:4rem; text-shadow: #000 0.1em 0.1em 0.2em;">{{ $jogador->numero_camisola }}</span>
                <p>{{ $jogador->posicao }}</p>
            </div>
            <div class="right">
                <div class="info">
                    <h3 style="margin-top:2.5rem;">Informação</h3>
                    <div class="info_data">
                        <div class="data">
                            <h4>Nome</h4>
                            <p>{{ $dados[0]->nome_completo }}</p>
                        </div>
                        <div class="data">
                            <h4>Posição</h4>
                            <p>{{ $jogador->posicao }}</p>
                        </div>
                        <div class="data">
                            <h4>Altura</h4>
                            <p>{{ $jogador->altura }} cm</p>
                        </div>
                        <div class="data">
                            <h4>Peso</h4>
                            <p>{{ $jogador->peso }} Kg</p>
                        </div>
                        <div class="data">
                            <h4>Nasceu:</h4>
                            <p>{{ $dados[0]->data_nascimento }}</p>
                        </div>
                    </div>
                </div>
                <div class="projects">
                    <h3>Outros dados</h3>
                    <div class="projects_data">
                        <div class="data">
                            <h4>Pertence a equipa dos: </h4>
                            <p>{{ $jogador->equipa->nome }}.</p>
                        </div>
                        <div class="data">
                            <h4>Naturalidade</h4>
                            <p>{{ $dados[0]->Naturalidade }}</p>
                        </div>
                        <div class="data">
                            <h4>Informação</h4>
                            <p>{{ $dados[0]->info }}</p>
                        </div>
                        @if (($dados[0]->link == null) || ($dados[0]->link == "null"))

                        @else
                        <div class="data">
                            <h4>Saber mais</h4>
                            <p><a href="{{ $dados[0]->link }}" target="_blank">Saber Mais</a></p>
                        </div>
                        @endif

                    </div>
                </div>
                {{-- <div class="social_media">
                    <ul>
                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-twitter-square"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
    @include('site.layouts._partials.footer')
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
