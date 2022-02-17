<?php

namespace Haaragard\BuscadorCursosAlura;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    public function __construct(
        private Client $httpClient,
        private Crawler $crawler
    ) {
        //
    }

    public function buscar(string $url): array
    {
        $response = $this->httpClient->get($url);

        $html = $response->getBody();
        $this->crawler->addHtmlContent($html);

        $elementos = $this->crawler->filter('span.card-curso__nome');

        $cursos = [];
        foreach ($elementos as $elemento) {
            $cursos[] = $elemento->textContent;
        }

        return $cursos;
    }
}
