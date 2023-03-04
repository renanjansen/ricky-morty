<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  GuzzleHttp\Client ;

class ApiRequestController extends Controller
{
    //

    public function requereApi(){

        $client = new \GuzzleHttp\Client();
        $url  = 'https://rickandmortyapi.com/api/character';

        $res = $client->get($url);
        $stream = $res->getBody();
        $content = json_decode($stream->getContents());
        $data = json_encode($content->results);

        $charactersResposta =  'character';
        $locationsResposta = 'location' ;
        $episodesResposta = 'episode' ;



        return view('welcome',
        [
            'data' => $data
        ]

    );
    }
}
