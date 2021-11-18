<?php

namespace Alura\BuscadorDeCursos;

use GuzzleHttp\ClientInterface;
// use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    private $httpClient;
    private $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
       $this->httpClient = $httpClient;
       $this->crawler = $crawler; 
    }

    public function buscar(string $url)
    {
        $resposta = $this->httpClient->request('GET', $url);

        $html = $resposta->getBody();
        $this->crawler->addHtmlContent($html);
        
        // Informar o atributo da pagina para busca 
        $elementosCursos = $this->crawler->filter('span.card-curso__nome');
        $cursos = [];

        foreach ($elementosCursos as $elemento) {
            $cursos[] = $elemento->textContent;
        }
        return $cursos;
    }
}