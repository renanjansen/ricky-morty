<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiRequestController extends Controller
{
    public function getEpisode($episodios)
    {
        $pos = strpos($episodios, "episode/") + strlen("episode/");
        $episodio = substr($episodios, $pos);

        // trata episódios menores que 10

        if($episodio < 10){
            $episodio = '0'.$episodio;
        };

        $primeiroEpisodio = 'https://aniture-2.blogspot.com/2020/08/rick-morty-episodio-'.$episodio.'-dublado-online.html';
        

        //dd($primeiroEpisodio);
         return $primeiroEpisodio ;
    }

    public function requereApi()
    {
        $client = new Client();
        $url = 'https://rickandmortyapi.com/api/character';

        $resposta = $client->request('GET', $url);
        $stream = $resposta->getBody();
        $content = json_decode($stream->getContents());

        $data = $content->results;
        $primeirosEpisodios = [];
        

        foreach ($data as $personagens) {
            array_push($primeirosEpisodios, $this->getEpisode($personagens->episode[0]));
        };

        
      
       //dd($primeirosEpisodios);
        return view('welcome', [
            'data' => $data,
            'primeirosEpisodios' => $primeirosEpisodios
        ]);

       
       
    }

   
}
