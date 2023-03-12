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
        <div class="row row-cols-auto d-flex justify-content-center">
            @for ($i = 0; $i < count($data); $i++)
                <div class="card p-2 m-2" style="width: 18rem; background-color:#7FFFD4;">
                    <img src="{{ str_replace('"', '', json_encode($data[$i]->image)) }}" class="card-img-top"
                        alt="{{ str_replace('"', ' ', json_encode($data[$i]->name)) }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ str_replace('"', ' ', json_encode($data[$i]->name)) }}</h5>
                        <p class="card-text">{{ str_replace('"', ' ', json_encode($data[$i]->species)) }}</p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal{{ json_encode($data[$i]->id) }}">
                            {{ str_replace('"', ' ', json_encode($data[$i]->name)) }}
                        </button>
                    </div>
                </div>
                <div class="modal fade"  id="exampleModal{{ json_encode($data[$i]->id) }}" tabindex="-1"
                    aria-labelledby="{{ json_encode($data[$i]->id) }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content justify-content-center text-center"style="background-color:#7FFFD4;">
                            <div class="modal-header justify-content-center text-center">
                                <h1 class="modal-title fs-1  justify-content-center text-center" id="{{ json_encode($data[$i]->id) }}">
                                    {{ str_replace('"', ' ', json_encode($data[$i]->name)) }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                    <ul class="list-group justify-content-center">
                                        <li class="list-group-item list-group-item-action">
                                            Espécie:{{ str_replace('"', ' ', json_encode($data[$i]->species)) }}</li>
                                        <li class="list-group-item list-group-item-action">Gênnero:
                                            {{ str_replace('"', ' ', json_encode($data[$i]->gender)) }}</li>
                                        <li class="list-group-item list-group-item-action">Origen:
                                            {{ str_replace('"', ' ', json_encode($data[$i]->origin->name)) }}</li>
                                        <li class="list-group-item list-group-item-action">Localização:
                                            {{ str_replace('"', ' ', json_encode($data[$i]->location->name)) }}</li>
                                        <li class="list-group-item list-group-item-action">Status:
                                            {{ str_replace('"', ' ', json_encode($data[$i]->status)) }}</li>
                                    </ul>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
