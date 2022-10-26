@extends('site.layouts.default')

@section('titulo', $titulo)

@section('conteudo')

    <section class="hero" id="hero">
        <div class="container-campos">
            <h2 class="sub-headline">
                <span class="first-letter">C</span>ampos
            </h2>
            <h1 class="headline"> CD Arrifanense </h1>
            <div class="headline-description">
                <div class="separator">
                    <!--Para o *-->
                    <div class="line line-left"></div>
                    <div class="asterisk"><i class="fas fa-asterisk"></i></div>
                    <div class="line line-right"></div>
                </div>
                <div class="single-animation">
                    <h5>Informações dos campos</h5>
                </div>
            </div>
        </div>
    </section>


    <section class="discover-our-story">
        <div class="container-campos">
            <div class="campos-info">
                <div class="campos-description padding-right animate-left">
                    <div class="global-headline">
                        <h2 class="sub-headline">
                            <span class="first-letter">C</span>ampo
                        </h2>
                        <h1 class="headline headline-dark">Relvado Natural</h1>
                        <div class="asterisk"><i class="fas fa-asterisk"></i></div>
                    </div>
                    <p>O Estádio Maria Carolina Leite Resende Garcia foi inicialmente um campo pelado, em que o seu nome é uma homenagem à falecida filha do dono do terreno, que cedido ao clube, o mesmo comprometeu-se a dar o nome este nome ao Estádio, que vigora até hoje.  </p>
                </div>
                <div class="campos-info-img  animate-right">
                    <img style="width: 100%;
                    max-width: 100%;
                    -o-object-fit: cover;
                    object-fit: cover;"
                        src="{{ asset('img/contato/campoArrifana.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="tasteful-recipes between">
        <div class="container-campos">
            <div class="global-headline">
                <div class="animate-top">
                    <h2 class="sub-headline">
                        <span class="first-letter"></span>
                    </h2>
                </div>
                <div class="animate-bottom">
                    <h1 class="headline "></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="discover-our-menu">
        <div class="container-campos">
            <div class="campos-info">
                <div class="image-group padding-right animate-left">
                    <img style="width: 100%;
                    max-width: 100%;
                    -o-object-fit: cover;
                    object-fit: cover;"
                        src="{{ asset('img/campo/Relvado2.jpg') }}" alt="">
                    <img style="width: 100%;
                    max-width: 100%;
                    -o-object-fit: cover;
                    object-fit: cover;"
                        src="{{ asset('img/campo/CampoRelvado.jpg') }}" alt="">
                    <img style="width: 100%;
                    max-width: 100%;
                    -o-object-fit: cover;
                    object-fit: cover;"
                        src="{{ asset('img/campo/campo1.jpg') }}" alt="">
                    <img style="width: 100%;
                    max-width: 100%;
                    -o-object-fit: cover;
                    object-fit: cover;"
                        src="{{ asset('img/campo/Relvado3.jpeg') }}" alt="">
                </div>
                <div class="campos-description animate-right">
                    <div class="global-headline">
                        <h2 class="sub-headline">
                            <span class="first-letter">N</span>ossa
                        </h2>
                        <h1 class="headline headline-dark">Evolução</h1>
                        <div class="asterisk"><i class="fas fa-asterisk"></i></div>
                    </div>
                    <p>A 24 de Fevereiro de 1996, foi colocado o campo relvado, inaugurado pelo Presidente da Câmara, Sr. Alfredo Oliveira Henriques.</p>
                </div>
            </div>
        </div>
    </section>

    {{--<section class="perfect-blend between">
        <div class="container-campos">
            <div class="global-headline">
                <div class="animate-top">
                    <h2 class="sub-headline">
                        <span class="first-letter">T</span>he perfect
                    </h2>
                </div>
                <div class="animate-bottom">
                    <h1 class="headline">Blend</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="culinary-delight">
        <div class="container-campos">
            <div class="campos-info">
                <div class="campos-description padding-right animate-left">
                    <div class="global-headline">
                        <h2 class="sub-headline">
                            <span class="first-letter">C</span>ulinary
                        </h2>
                        <h1 class="headline headline-dark">Delight</h1>
                        <div class="asterisk"><i class="fas fa-asterisk"></i></div>
                    </div>
                    <p>lorem Ipsum is simply dummy, but who knows what you think of. Lorem Ipsum is simply dummy, but who
                        knows what you think of.</p>
                </div>
                <div class="image-group">
                    <img class="animate-top"
                        style="width: 100%;
                    max-width: 100%;
                    -o-object-fit: cover;
                    object-fit: cover;"
                        src="{{ asset('img/contato/campoArrifana.jpg') }}" alt="">

                    <img class="animate-bottom"
                        style="width: 100%;
                    max-width: 100%;
                    -o-object-fit: cover;
                    object-fit: cover;"
                        src="{{ asset('img/contato/campoArrifana.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </section>--}}

    <section class="tasteful-recipes between">
        <div class="container-campos">
            <div class="global-headline">
                <div class="animate-top">
                    <h2 class="sub-headline">
                        <span class="first-letter">C</span>ampo
                    </h2>
                </div>
                <div class="animate-bottom">
                    <h1 class="headline ">Sintético</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="discover-our-story">
        <div class="container-campos">
            <div class="campos-info">
                <div class="campos-description padding-right animate-left">
                    <div class="global-headline">
                        <h2 class="sub-headline">
                            <span class="first-letter">C</span>ampo
                        </h2>
                        <h1 class="headline headline-dark">Relvado Sintético</h1>
                        <div class="asterisk"><i class="fas fa-asterisk"></i></div>
                    </div>
                    <p>O Campo de Jogos situa-se em Arrifana, tendo passado a relvado sintético em 2011.</p>
                </div>
                <div class="campos-info-img  animate-right">
                    <img style="width: 100%;
                    max-width: 100%;
                    -o-object-fit: cover;
                    object-fit: cover;"
                        src="{{ asset('img/campo/campo.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="tasteful-recipes between">
        <div class="container-campos">
            <div class="global-headline">
                <div class="animate-top">
                    <h2 class="sub-headline">
                        <span class="first-letter"></span>
                    </h2>
                </div>
                <div class="animate-bottom">
                    <h1 class="headline "></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="discover-our-menu">
        <div class="container-campos">
            <div class="campos-info">
                <div class="image-group padding-right animate-left">
                    <img style="width: 100%;
                    max-width: 100%;
                    -o-object-fit: cover;
                    object-fit: cover;"
                        src="{{ asset('img/campo/1.jpg') }}" alt="">
                    <img style="width: 100%;
                    max-width: 100%;
                    -o-object-fit: cover;
                    object-fit: cover;"
                        src="{{ asset('img/campo/2.jpg') }}" alt="">
                    <img style="width: 100%;
                    max-width: 100%;
                    -o-object-fit: cover;
                    object-fit: cover;"
                        src="{{ asset('img/campo/3.jpg') }}" alt="">
                    <img style="width: 100%;
                    max-width: 100%;
                    -o-object-fit: cover;
                    object-fit: cover;"
                        src="{{ asset('img/campo/4.jpg') }}" alt="">
                </div>
                <div class="campos-description animate-right">
                    <div class="global-headline">
                        <h2 class="sub-headline">
                            <span class="first-letter">N</span>ova
                        </h2>
                        <h1 class="headline headline-dark">Marca</h1>
                        <div class="asterisk"><i class="fas fa-asterisk"></i></div>
                    </div>
                    <p>No dia 1 de Julho de 2022, passou a chamar-se <strong>Campo de Jogos Grifagem JP</strong>.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="perfect-blend between">
        <div class="container-campos">
            <div class="global-headline">
                <div class="animate-top">
                    <h2 class="sub-headline">
                        <span class="first-letter"></span>
                    </h2>
                </div>
                <div class="animate-bottom">
                    <h1 class="headline"></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="culinary-delight">
        <div class="container-campos">
            <div class="campos-info">
                <div class="campos-description padding-right animate-left">
                    <div class="global-headline">
                        <h2 class="sub-headline">
                            <span class="first-letter">U</span>m pouco
                        </h2>
                        <h1 class="headline headline-dark">do Campo</h1>
                        <div class="asterisk"><i class="fas fa-asterisk"></i></div>
                    </div>
                    <p>Demostração do campo</p>
                </div>
                <div class="image-group">
                    <img class="animate-top"
                        style="width: 100%;
                    max-width: 100%;
                    -o-object-fit: cover;
                    object-fit: cover;"
                        src="{{ asset('img/campo/CampoSintetico2.jpg') }}" alt="">

                    <img class="animate-bottom"
                        style="width: 100%;
                    max-width: 100%;
                    -o-object-fit: cover;
                    object-fit: cover;"
                        src="{{ asset('img/campo/CampoSintetico3.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </section>



@endsection
