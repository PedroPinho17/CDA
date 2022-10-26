<!--Footer-->
    <footer>
        <div class="container-footer">
            <div class="content_footer">
                <div class="profil">
                    <div class="logo_area">
                        <a href="{{route('site.index')}}">
                            <img src="{{asset('img/clube/logo_arrifana.png')}}" alt="Logotipo do Arrifana" >
                        </a>
                        <span class="logo_name">Clube Desportivo Arrifanense</span>
                    </div>
                    <div class="desc_area">
                        <p>
                            O Clube Desportivo Arrifanense é um clube português, sedeado na vila de Arrifana, concelho de Santa Maria da Feira, distrito de Aveiro.
                            O clube foi fundado a 2 de Abril de 1921.
                        </p>
                    </div>
                    <div class="social_media">
                        <!--<a href="#"><i class='bx bxl-youtube'></i></a>-->
                        <a href="https://www.facebook.com/ClubeDesportivoArrifanense/" target="_blank"><i class='bx bxl-facebook-circle'></i></a>
                        <a href="https://www.instagram.com/cdarrifanense/" target="_blank"><i class='bx bxl-instagram'></i></a>
                        <!--<a href="#"><i class='bx bxl-twitter' target="_blank"></i></a>-->
                        <!--<a href=""Mail::to('cdarrifanense@gmail.com')"" target="_blank"><i class='bx bxl-gmail'></i></a>-->
                    </div>
                </div>
                <div class="service_area">
                    <ul class="service_header">
                        <a href="{{route('site.index')}}"><li class="service_name">Home</li></a>
                    </ul>
                    <ul class="service_header">
                        <li class="service_name">Clube</li>
                        <li><a href="{{route('site.historia')}}">História</a></li>
                        <li><a href="{{route('site.presidente')}}">Presidente</a></li>
                        <li><a href="{{ url('clube/membros/direção') }}"> Membros </a></li>
                        <li><a href="{{route('site.campos')}}">Campos</a></li>
                        <li><a href="{{route('site.galeria')}}"> Galeria </a></li>
                        <li><a href="{{route('site.patrocinadores')}}"> Patrocinios </a></li>
                    </ul>
                    <ul class="service_header">
                        <li class="service_name">Futebol</li>
                        <li><a href="{{ url('jogadores/seniores') }}">Seniores</a></li>
                        <li><a href="{{ url('jogadores/juniores') }}">Juniores</a></li>
                    </ul>
                    <ul class="service_header">
                        <a href="{{route('site.loja')}}"><li class="service_name">Loja</li></a>
                    </ul>
                    <ul class="service_header">
                        <a href="{{ route('site.contato', ['reservar' => 0]) }}"><li class="service_name">Contacto</li></a>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="footer_bottom">
                <div class="copy_right">
                    <i class='bx bxs-copyright'></i>
                    <span>2022 Clube Desportivo Arrifanense</span>
                </div>
                <div class="tou">
                    <a href="#">Term of Use</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Cookie</a>
                </div>
            </div>
        </div>
    </footer>
<!--End footer-->
