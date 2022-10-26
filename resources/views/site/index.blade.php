@extends('site.layouts.main')
@section('main')
    <style>
        .nav-list a{color: black;}
        .sub-menu a{color: #144D29;}
    </style>
    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="container">

            <div class="row align-items-center text-center text-md-left min-vh-100">
                <div class="col-md-6">
                    <!-- <span>Clube Desportivo Arrifanense</span>-->
                    <h3>Clube Desportivo Arrifanense</h3>
                    <!-- <a href="#" class="link-btn">get started</a> -->
                </div>
            </div>

        </div>

    </section>

    <!-- home section ends -->
    <div class="total">
        <section class="about-1" id="about-1">
            <div class="container">

                <div class="icons-container">
                    <div class="icons">
                        <i class="fa-solid fa-calendar"></i>
                        <h3>101 anos</h3>
                    </div>
                    <div class="icons">
                        <i class="fa-solid fa-user-tie"></i>
                        <h3> {{ $num_presidentes[0]->num_presidentes }} Presidentes </h3>
                    </div>
                    <div class="icons">
                        <i class="fa-solid fa-people-group"></i>
                        <h3> +200 Treinadores</h3>
                    </div>
                    <div class="icons">
                        <i class="fa-solid fa-futbol"></i>
                        <h3>+1200 Jogos</h3>
                    </div>
                    <div class="icons">
                        <i class="fa-solid fa-user-tie"></i>
                        <h3> +200 Sócios</h3>
                    </div>
                </div>

            </div>
        </section>
        <!-- about section starts  -->

        <section class="about" id="about">

            <div class="container">

                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1>História</h1>
                        <h3 class="title">Um Clube de Coração</h3>
                        <p>Se a história de um clube de Lisboa que nasceu numa farmácia e jogava de águia ao peito já é
                            conhecida, não deixa de ser curioso que o CD Arrifanense partilhe a mesma génese, um símbolo
                            idêntico, com um fundador oriundo de Lisboa... e sportinguista de coração </p>
                        <a href="{{ route('site.historia') }}" class="link-btn">Ler Mais</a>

                        <div class="icons-container">
                            <div class="icons">
                                <i class="fa-solid fa-calendar"></i>
                                <h3>101 anos</h3>
                            </div>
                            <div class="icons">
                                <i class="fa-solid fa-user-tie"></i>
                                <h3> +200 Sócios</h3>
                            </div>
                            <div class="icons">
                                <i class="fa-solid fa-futbol"></i>
                                <h3>+1200 Jogos</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('img/clube/home.png') }}" class="w-100" alt="{{ $ultimo_presidente[0]->nome }}">
                    </div>
                </div>

            </div>

        </section>

        <!-- about section ends -->

        <!-- about section starts  -->

        <section class="about-1" id="about-1">

            <div class="container">

                <div class="row align-items-center">
                    <div class="col-md-6">
                        <img src="/storage/foto_presidente/{{ $ultimo_presidente[0]->foto }}" class="w-100" 
                            alt="{{ $ultimo_presidente[0]->nome }}">
                    </div>
                    <div class="col-md-6">
                        <h1>Presidente</h1>
                        <h3 class="title">{{ $ultimo_presidente[0]->nome }}</h3>
                        <p>Este presidente {{ $ultimo_presidente[0]->nome }}, foi o {{ $ultimo_presidente[0]->id }}
                            presidente do Clube Desportivo Arrifanense de {{ $ultimo_presidente[0]->ano_inicio }} até
                            {{ $ultimo_presidente[0]->ano_final }}.</p>
                        <a href="{{ route('site.presidente') }}" class="link-btn">Ler Mais</a>
                        <div class="icons-container">
                            <div class="icons">
                                <i class="fa-solid fa-user-tie"></i>
                                <h3>{{ $ultimo_presidente[0]->id }}º Presidente</h3>
                            </div>
                            <div class="icons">
                                <i class="fa-solid fa-calendar"></i>
                                <h3>{{ $ultimo_presidente[0]->ano_inicio }} - {{ $ultimo_presidente[0]->ano_final }}</h3>
                            </div>
                            <div class="icons">
                                <i class="fa-solid fa-user-tie"></i>
                                <h3> {{ $num_presidentes[0]->num_presidentes }} Presidentes </h3>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>

        <!-- about section ends -->

        <!-- gallery section starts  -->

        <section class="gallery" id="gallery">

            <h1 class="heading"> Galeria </h1>

            <div class="box-container container">

                @foreach ($ultimas_fotos as $ultimas_foto)
                    <div class="box">
                        <img src="/storage/galeria/{{ $ultimas_foto->foto }}"
                            alt="{{ $ultimas_foto->titulo }} - {{ $ultimas_foto->id }}">
                        <div class="content">
                            <h3>{{ $ultimas_foto->titulo }} - {{ $ultimas_foto->id }}</h3>
                            <p>{{ $ultimas_foto->descricao }}</p>
                            <a href="{{ $ultimas_foto->link }}" target="_blank" class="link-btn">ler mais</a>
                        </div>
                    </div>
                @endforeach
            </div>

        </section>

        <!-- gallery section ends -->

        <!-- blogs section starts  -->

        <section class="blogs" id="blogs">

            <h1 class="heading"> Postagens </h1>

            <div class="box-container container">

                @foreach ($ultimos_posts as $ultimos_post)
                    <div class="box">
                        <div class="image">
                            <img src="/storage/posts/{{ $ultimos_post->foto }}" alt="{{ $ultimos_post->titulo }}">
                        </div>
                        <div class="content">
                            <h3
                                style="overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;">
                                {{ $ultimos_post->titulo }}</h3>
                            <p
                                style="overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;">
                                {{ $ultimos_post->descricao }}</p>
                            <a href="{{ $ultimos_post->link }}" target="_blank" class="link-btn">ler mais</a>
                        </div>
                        <div class="icons">
                            <span> <i class="fas fa-calendar"></i> {{ date('d-m-Y', strtotime($ultimos_post->data)) }}
                            </span>
                            <span> <i class="fas fa-user"></i> {{ $ultimos_post->name }} </span>
                        </div>
                    </div>
                @endforeach
            </div>

        </section>

    </div>
@endsection
