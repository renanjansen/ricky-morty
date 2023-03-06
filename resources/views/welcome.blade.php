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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <style>
        .flip-card {
            background-color: transparent;
            width: 300px;
            height: 200px;
            border: 1px solid #f1f1f1;
            perspective: 1000px;
            /* Remove this if you don't want the 3D effect */
        }

        /* This container is needed to position the front and back side */
        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.8s;
            transform-style: preserve-3d;
        }

        /* Do an horizontal flip when you move the mouse over the flip box container */
        .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
        }

        /* Position the front and back side */
        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden;
            /* Safari */
            backface-visibility: hidden;
        }

        /* Style the front side (fallback if image is missing) */
        .flip-card-front {
            background-color: #bbb;
            color: black;
        }

        /* Style the back side */
        .flip-card-back {
            background-color: dodgerblue;
            color: white;
            width: 100%;
            height: 100%;
            transform: rotateY(180deg);
        }
    </style>

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
                        <a href="#" class="btn btn-primary">{{ str_replace('"', ' ', json_encode($data[$i]->location->name)) }}</a>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</body>

</html>
