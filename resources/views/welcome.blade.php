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
    <div class="container-fluid p-5" id="app">
        <div class="row row-cols-auto d-flex justify-content-center">
            <div class="col-12">
                <form class="d-flex async-form" action={{ route('buscaPersonagem') }} method="GET">
                    <input class="form-control me-2 mb-2" type="search" placeholder="Buscar Personagens" name="buscar"
                        data-bs-toggle="modal" data-bs-target="#exampleModal" aria-label="Buscar" required>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <input class="form-control me-2 mb-2" type="search"
                                        placeholder="Buscar Personagens" name="buscar" aria-label="Buscar" required>
                                </div>
                                <div class="modal-body">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item list-group-item-action">A second link
                                            item</a>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            @for ($i = 0; $i < count($data); $i++)
               <card nome="{{ $data[$i]->name }}" especie="{{ $data[$i]->name }}" imagem="{{ $data[$i]->image }}"
                    id="{{ $data[$i]->id }}" genero="{{ $data[$i]->gender }}"
                    nome_original="{{ $data[$i]->origin->name }}" localizacao="{{ $data[$i]->location->name }}"
                    status="{{ $data[$i]->status }}" episode="{{ $primeirosEpisodios[$i] }}"></card>
            @endfor
        </div>
        <form method="GET" action={{ route('home') }} class="async-form">

            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="submit" class="btn btn-primary" id="prevBtn" name="id"
                    value={{ $pagina }}><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                    </svg>Anterior</button>
                <button type="submit" class="btn btn-primary" id="nextBtn" name="id"
                    value={{ $pagina }}>Próximo <svg xmlns="http://www.w3.org/2000/svg" width="16"
                        height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                    </svg></button>
            </div>
        </form>

    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
        var meuBotaoNext = document.getElementById("nextBtn");
        var valorAtual = meuBotaoNext.value;
        meuBotaoNext.addEventListener("click", function() {
            valorAtual++;
            meuBotaoNext.value = valorAtual;
        });

        var meuBotaoPrev = document.getElementById("prevBtn");
        var valorAtual = meuBotaoPrev.value;
        meuBotaoPrev.addEventListener("click", function() {
            valorAtual--;
            meuBotaoPrev.value = valorAtual;
        });

        if (valorAtual <= 1) {

            meuBotaoPrev.disabled = true;
        }
    </script>
</body>

</html>
