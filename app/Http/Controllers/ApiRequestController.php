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

        if ($episodio < 10) {
            $episodio = '0' . $episodio;
        };

        $primeiroEpisodio = 'https://aniture-2.blogspot.com/2020/08/rick-morty-episodio-' . $episodio . '-dublado-online.html';


        //dd($primeiroEpisodio);
        return $primeiroEpisodio;
    }

    public function getPersonagens($count){


        $modula = [];

        for ($i = 1; $i <= $count; $i++) {
            $modula[] = $i;
        }
        $modula_string = implode(",", $modula);

        $client = new Client();
        $urlPersonagens = 'https://rickandmortyapi.com/api/character/' . $modula_string;

        $respostaPersonagem = $client->request('GET', $urlPersonagens);
        $streamPersonagem = $respostaPersonagem->getBody();



        $contentPersonagens = json_decode($streamPersonagem->getContents());
        return $contentPersonagens ;

    }

    public function requereApi(Request $request)
    {
        $client = new Client();
        $pagina = $request->id;
        dump($pagina);

        $url = 'https://rickandmortyapi.com/api/character/?page=' . $pagina;

        $resposta = $client->request('GET', $url);
        $stream = $resposta->getBody();

        $content = json_decode($stream->getContents());
        $count = $content->info->count;
        $paginas = $content->info->pages;
        if ($pagina == null || $pagina <= 0 || $pagina > $paginas) {
            $pagina = 1;
        }

        $data = $content->results;
        $primeirosEpisodios = [];
        $listaDePersonagens = $this->getPersonagens($count);
       // dd($listaDePersonagens);

        foreach ($data as $personagens) {
            array_push($primeirosEpisodios, $this->getEpisode($personagens->episode[0]));
        };


        return view('welcome', [
            'data' => $data,
            'primeirosEpisodios' => $primeirosEpisodios,
            'pagina' => $pagina,
            'paginas' => $paginas,
            'listaDePersonagens' => $listaDePersonagens
        ]);
    }

    public function buscarPersonagem(Request $request){

        $personagemNome = $request->input('selectedPersonagem');

        $client = new Client();
        $urlPersonagen = 'https://rickandmortyapi.com/api/character/?name=' . $personagemNome;


        $respostaPersonagem = $client->request('GET', $urlPersonagen);
        //dd($respostaPersonagem);
        $streamPersonagem = $respostaPersonagem->getBody();

        $contentPersonagen = json_decode($streamPersonagem->getContents());
        $data = $contentPersonagen->results;
        $primeirosEpisodios = [];

        foreach ($data as $personagens) {
            array_push($primeirosEpisodios, $this->getEpisode($personagens->episode[0]));
        };
       // dd($contentPersonagen);

        return view('buscaPersonagem', [
            'data' => $data,
            'primeirosEpisodios' => $primeirosEpisodios
        ]);
    }
}
