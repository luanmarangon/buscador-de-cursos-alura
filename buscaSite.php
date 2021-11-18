<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;


// Foi passado paremetro verify como false para não consultar SSL
$client = new \GuzzleHttp\Client(['verify' => false]);
// Informar a URL da Consulta
$resposta = $client->request('GET', 'https://www.alura.com.br/cursos-online-programacao/php');

$html = $resposta->getBody();

$crawler = new Crawler();
$crawler->addHtmlContent($html);
// Informar o atributo da pagina para busca 
$cursos = $crawler->filter('span.card-curso__nome');



foreach ($cursos as $curso) {
    echo $curso->textContent . PHP_EOL;
}