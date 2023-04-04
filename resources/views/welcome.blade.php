<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Apllicaton CSS -->
    <link rel="stylesheet" type="text/css" href="/css/welcome.blade.css" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Rick & Morty</title>
</head>

<body class="container text-center bg-dark">
    <div class="container-fluid p-5">
        <div id="app">
            <Home />
        </div>
        <div class="row row-cols-auto d-flex justify-content-center">


            @for ($i = 0; $i < count($data); $i++)
                @component('componentes.card', [
                    'nome' => $data[$i]->name,
                    'especie' => $data[$i]->species,
                    'imagem' => $data[$i]->image,
                    'id' => $data[$i]->id,
                    'genero' => $data[$i]->gender,
                    'nome_original' => $data[$i]->origin->name,
                    'localizacao' => $data[$i]->location->name,
                    'status' => $data[$i]->status,
                ])
                @endcomponent
            @endfor


        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
