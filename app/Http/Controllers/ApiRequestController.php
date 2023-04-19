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

        // trata epis�dios menores que 10

        if($episodio < 10){
            $episodio = '0'.$episodio;
        };

        $primeiroEpisodio = 'https://aniture-2.blogspot.com/2020/08/rick-morty-episodio-'.$episodio.'-dublado-online.html';
        

        //dd($primeiroEpisodio);
         return $primeiroEpisodio ;
    }

    public function requereApi(Request $request)
    {
        $client = new Client();
        $pagina = $request->id;
       
       // $pagina += $pagina;
        //var_dump($pagina);
        $url = 'https://rickandmortyapi.com/api/character/?page='.$pagina;

        $resposta = $client->request('GET', $url);
        $stream = $resposta->getBody();
        
        $content = json_decode($stream->getContents());
        $count = $content->info->count;
        $paginas =$content->info->pages;
        if($pagina == null || $pagina <= 0 || $pagina > $count){
            $pagina = 1;
        }
        
        $data = $content->results;
        $primeirosEpisodios = [];
        

        foreach ($data as $personagens) {
            array_push($primeirosEpisodios, $this->getEpisode($personagens->episode[0]));
        };

        
      
      // dd($content->info);
       
        return view('welcome', [
            'data' => $data,
            'primeirosEpisodios' => $primeirosEpisodios,
            'pagina' => $pagina,
            'paginas' => $paginas,
        ]);

       
       
    }

   
}
