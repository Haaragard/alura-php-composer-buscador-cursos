<?php

namespace Haaragard\BuscadorCursosAlura;

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client([ 'base_uri' => 'https://www.alura.com.br/']);

$buscador = new Buscador($client, new Crawler());

$cursos = $buscador->buscar('/cursos-online-programacao/php');

foreach ($cursos as $curso) {
    echo $curso . PHP_EOL;
}