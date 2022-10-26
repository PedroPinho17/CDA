<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<style>
    .page-break {
        page-break-after: always;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    .title {
        text-align: center;
        font-size: 20pt;
        font-weight: bold;
        text-transform: capitalize;
    }

    .titulo {
        border: 1px;
        background-color: #2fa866;
        text-align: center;
        width: 100%;
        text-transform: uppercase;
        font-weight: bold;
        margin-bottom: 25px;
    }

    .principal {
        border: 1px;
        background-color: #2fa866;
        text-align: center;
        width: 100%;
        text-transform: uppercase;
        font-weight: bold;
        margin-bottom: 25px;
    }

    .dados {
        border: 1px;
        text-align: center;
        width: 100%;
        text-transform: uppercase;
        font-weight: bold;
        margin-bottom: 25px;
    }

    table th {
        text-align: center;
    }

    img {
        float: left;
        font-size: 1rem;
        color: black;
        width: 13.5rem;
        height: 13.5rem;
    }
</style>

<body>
    <h1 class="title">Clude Desportivo Arrifanense</h1>
    <div class="titulo">Lista de Posts</div>

    <table style="width: 90rem; text-align: center;">
        <thead>
            <tr>
                <td class="principal">ID</td>
                <td class="principal">Titulo</td>
                <td class="principal">Descrição</td>
            </tr>
            <tr>
                <td class="principal">Data</td>
                <td class="principal">Link</td>
                <td class="principal">Imagem</td>
                <td class="principal">Utilizador</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $key => $post)
                <tr>
                    <td class="dados">{{ $post->id_post }}</td>
                    <td class="dados">{{ $post->titulo }}</td>
                    <td class="dados">{{ $post->descricao }}</td>
                </tr>
                <tr>
                    <td class="dados">{{ $post->data }}</td>
                    <td class="dados">{{ $post->link }}</td>
                    <td class="dados">{{ $post->imagem }}</td>
                    <td class="dados">{{ $post->user->name }}</td>
                </tr>
            @endforeach
        </tbody>
        <thead>
            <tr>
                <td class="principal">Data</td>
                <td class="principal">Link</td>
                <td class="principal">Imagem</td>
                <td class="principal">Utilizador</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $key => $post)
                <tr>
                    <td class="dados">{{ $post->data }}</td>
                    <td class="dados">{{ $post->link }}</td>
                    <td class="dados">{{ $post->imagem }}</td>
                    <td class="dados">{{ $post->user->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
