@extends('site.layouts.default')

@section('titulo', $titulo)

@section('conteudo')
    <div class="history">
        <h3>História</h3>
        <h2>Fundado em 1921</h2>
        <picture>
            <img src="{{ asset('img/clube/logo_arrifana.png') }}" alt="Logotipo do CD Arrifanense">
        </picture>
        <p style="text-align: center;">
            Este é o símbolo do <strong> Clube Desportivo Arrifanense</strong>, fundado em 02 de abril de 1921 pelo seu
            criador:
        </p>
        <p style="text-align:center;"><strong>Manuel José Pereira</strong>.</p>
        <picture>
            <img src="/storage/foto_presidente/{{ $foto[0]->foto }}" class="w-100" alt="{{ $foto[0]->nome }}">
        </picture>
        <br>
        <span style="font-size:12pt;"><strong>{{ $foto[0]->nome }}</strong></span>
        <h2> UM CLUBE DE CORAÇÃO </h2>
        <p>
            Se a história de um clube de Lisboa que nasceu numa farmácia e jogava de águia ao peito já é conhecida,
            não deixa de ser curioso que o <strong> CD Arrifanense </strong> partilhe a mesma génese, um símbolo idêntico,
            com um fundador oriundo de Lisboa...
            e sportinguista de coração.
            <strong>1921</strong> marca o começo da história desta carismática coletividade de Arrifana,
            quando<strong>Manuel José Pereira</strong> fundou o
            <strong>Aliança Futebol clube</strong>, da farmácia com o mesmo nome (que ainda hoje existe) e que mais tarde
            seria transformado no
            <strong>Clube Desportivo Arrifanense.</strong>
        </p>
        <picture>
            <img class="img-hist" src="{{ asset('img/clube/fim_hist-removebg-preview.png') }}" alt="Imagem">
        </picture>
        <h3> Comemoração 100 Anos </h3>
        <div class="video" style="margin-top:2rem; ">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/uMdfnIHXPDc"
                title="1ª Caminha Centenário - Clube Desportivo Arrifanense" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>
        <div class="video" style="margin-top:2rem; ">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/zOED8nB6MgE"
                title="Celebração do 101º Aniversário do Clube Desportivo Arrifanense" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>
        <h3> CRONOLOGIA </h3>
        <p style="text-align: center;">Nesta cronologia, recordamos os maiores momentos do clube:</p>

        <div class="container">
            <div class="timeline">
                <ul>
                    <li>
                        <div class="timeline-content">
                            <h3 class="date">Abril de 1921</h3>
                            <h2>Aliança Futebol Clube</h1>
                                <p>Deu-se origem ao Aliança Futebol Clube, que mais tarde passaria a ser <strong>Clube Desportivo Arrifanense</strong>.</p>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-content">
                            <h3 class="date">1975</h3>
                            <h2>Subida de Divisão - Iniciados</h2>
                            <p>Subida de Divisão do escalão de Iniciados à Primeira Nacional.</p>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-content">
                            <h3 class="date">1998</h3>
                            <h2>Subida de Divisão - Séniores</h2>
                            <p>Subida à Segunda Divisão Nacional B, no escalão de Séniores.</p>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-content">
                            <h3 class="date">2002</h3>
                            <h2>Subida de Divisão - Juniores</h2>
                            <p>Subida à primeira divisão nacional de Juniores.</p>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-content">
                            <h3 class="date">2011</h3>
                            <h2>Criação da Seção de Futsal</h2>
                            <p>Criação da Seção de Futsal.</p>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-content">
                            <h3 class="date">Abril de 2021</h3>
                            <h2>100 Anos</h2>
                            <p>Realização dos 100 anos do clube.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

@endsection
