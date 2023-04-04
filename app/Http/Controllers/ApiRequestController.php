<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiRequestController extends Controller
{
    public function requereApi()
    {
        $client = new Client();
        $url = 'https://rickandmortyapi.com/api/character';

        $resposta = $client->request('GET', $url);
        $stream = $resposta->getBody();
        $content = json_decode($stream->getContents());

        $data = $content->results;

        // Uncomment the code below to dump the data for debug purposes
        /*
        foreach ($data as $personagens) {
            dump($personagens);
        }
        */

        return view('welcome', [
            'data' => $data,
        ]);
    }
}
