<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Apllicaton CSS -->
    <link rel="stylesheet" type="text/css" href="/css/welcome.blade.css" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>





    <title>Rick & Morty</title>
</head>

<body class="container text-center bg-dark">
    <div class="container-fluid p-5" id="app">
        <div class="row row-cols-auto d-flex justify-content-center">
            <card nome="{{ $data[0]->name }}" especie="{{ $data[0]->species }}" imagem="{{ $data[0]->image }}"
                id="{{ $data[0]->id }}" genero="{{ $data[0]->gender }}" nome_original="{{ $data[0]->origin->name }}"
                localizacao="{{ $data[0]->location->name }}" status="{{ $data[0]->status }}"
                episode="{{ $primeirosEpisodios[0] }}"></card>
        </div>
            <!-- Tela de carregamento -->
        <div class="loading-overlay" id="loadingOverlay">
            <div class="loading-text">Carregando...</div>
        </div>

        <a class="navbar-brand" href="/">
            <button class="btn btn-primary"
                id="volta">
                Voltar a lista
            </button>
        </a>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
          const button = document.getElementById('volta');

button.addEventListener('click', () => {
    // Mostrar a tela de carregamento usando o plugin $.LoadingOverlay
    $.LoadingOverlay("show", {
        image: "",
        custom: $("<div>", {
            text: "Carregando...",
            class: "loading-text"
        }),
    });

    // Realizar o redirecionamento após algum tempo simulado
    setTimeout(() => {
        $.LoadingOverlay("text");
    }, 1000);
});



    </script>





</body>

</html>
