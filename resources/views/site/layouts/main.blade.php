<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CD Arrifanense - Home</title>
    <link rel="shortcut icon" href="{{ asset('img/clube/logo_arrifana.png') }}" type="image/x-icon">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <!-- swiper css link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>


    <!-- bootstrap cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">


    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

</head>

<body>
    @include('site.layouts._partials.menu') {{-- Inclui o menu(navbar --> barra de navegação) --}}
    @yield('main') {{-- Esta linha abre a possilbilidade de na crição de uma nova página realizar a operação @section('main') @endsection
    e tudo o que for la colocado ficará inserido no body --}}
    <script src="{{ asset('js/script.js') }}"></script> {{-- Inclui o script do menu --}}
    @include('site.layouts._partials.footer') {{-- Inclui o footer --}}

</body>

</html>
