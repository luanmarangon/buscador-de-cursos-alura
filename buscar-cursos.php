<?php

require 'vendor/autoload.php';
// require 'src/Buscador.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Alura\BuscadorDeCursos\Buscador;


// Foi passado paremetro verify como false para não consultar SSL
$client = new \GuzzleHttp\Client(['base_uri' => 'https://www.alura.com.br/','verify' => false]);
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');


foreach ($cursos as $curso) {
    echo $curso . PHP_EOL;
}