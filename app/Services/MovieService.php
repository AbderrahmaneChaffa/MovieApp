<?php

namespace App\Services;

use GuzzleHttp\Client;

class MovieService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('TMDB_API_KEY'); // Assurez-vous d'avoir ajouté TMDB_API_KEY dans votre fichier .env
    }

    /**
     * Récupère la liste des films populaires.
     *
     * @param int $page
     * @return array
     */
    public function getMovies($page = 1)
    {
        $response = $this->client->get("https://api.themoviedb.org/3/movie/popular?api_key={$this->apiKey}&page={$page}");
        return json_decode($response->getBody(), true);
    }

    /**
     * Récupère la liste des séries populaires.
     *
     * @param int $page
     * @return array
     */
    public function getSeries($page = 1)
    {
        $response = $this->client->get("https://api.themoviedb.org/3/tv/popular?api_key={$this->apiKey}&page={$page}");
        return json_decode($response->getBody(), true);
    }

    /**
     * Récupère les détails d'un film ou d'une série.
     *
     * @param string $type (movie ou tv)
     * @param int $id
     * @return array
     */
    public function getDetails($type, $id)
    {
        $response = $this->client->get("https://api.themoviedb.org/3/{$type}/{$id}?api_key={$this->apiKey}");
        return json_decode($response->getBody(), true);
    }

    /**
     * Recherche des films ou des séries.
     *
     * @param string $query
     * @return array
     */
    public function search($query)
    {
        $response = $this->client->get("https://api.themoviedb.org/3/search/multi?api_key={$this->apiKey}&query={$query}");
        return json_decode($response->getBody(), true);
    }
}