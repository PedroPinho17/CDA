@extends('site.layouts.default')

@section('titulo', $titulo)

@section('conteudo')
    <!--Contato Form-->
    <div class="main-contact">
        <div class="contact-wrap">
            <div class="contact-in">
                <h1>Informações de Contacto</h1>
                <h2><i class="fa fa-phone" aria-hidden="true"></i> Telefone</h2>
                <p>256 130 160</p>
                <h2><i class="fa fa-envelope" aria-hidden="true"></i> Email</h2>
                <p>cdarrifanense@gmail.com</p>
                <h2><i class="fa fa-map-marker" aria-hidden="true"></i> Morada</h2>
                <p>R. Alexandre Ferreira Tavares, 3700-506 Arrifana</p>
                <ul>
                    <li><a href="https://www.facebook.com/ClubeDesportivoArrifanense/" target="_blank"><i
                                class="bx bxl-facebook-circle" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.instagram.com/cdarrifanense/" target="_blank"><i class="bx bxl-instagram"
                                aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <div class="contact-in">
                <h1>Envie uma mensagem</h1>
                <form action="{{ route('send.email') }}" method="post">
                    @csrf
                    <input type="text" name="nome" placeholder="Nome completo" class="contact-in-input">
                    @error('nome')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" name="email" placeholder="Email" class="contact-in-input">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    @if ($reservar == 1)
                        <input type="text" name="assunto" placeholder="Assunto" value="Reservar"
                            class="contact-in-input">
                    @else
                        <input type="text" name="assunto" placeholder="Assunto" class="contact-in-input">
                    @endif
                    @error('assunto')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <textarea name="mensagem" placeholder="Mensagem" class="contact-in-textarea"></textarea>
                    @error('mensagem')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="submit" value="ENVIAR" class="contact-in-btn">
                </form>
            </div>
            <div class="contact-in">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3014.854926727101!2d-8.498850484958284!3d40.91892667930993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd23813a5fd1cc93%3A0x397d6ecd26c21eda!2sClube%20Desportivo%20Arrifanense!5e0!3m2!1spt-PT!2spt!4v1649407202565!5m2!1spt-PT!2spt"
                    width="100%" height="auto" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    <!--End Contato Form-->
@endsection
