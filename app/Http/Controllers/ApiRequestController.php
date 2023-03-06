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


        $resposta = $client->request('GET', $url);
        $res = $client->get($url);
        $stream = $resposta->getBody();
        $content = json_decode($stream->getContents());
        $data = $content->results;

        //var_dump($data);

        /*foreach($data as $personagens){
            dump($personagens);
        }*/
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
