<?php

namespace Haaragard\BuscadorCursosAlura;

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();
$resposta = $client->get('https://alura.com.br/');

$html = $resposta->getBody();