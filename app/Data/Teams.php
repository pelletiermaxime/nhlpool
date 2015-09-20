<?php
namespace Nhlpool\Data;

use GuzzleHttp\Client;
use Illuminate\Support\Collection;

class Teams
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://nhlstats.org/api/',
        ]);
    }

    public function all() : Collection
    {
        $response = $this->client->request('GET', 'teams');
        $teams = json_decode($response->getBody(), true)['teams'];
        return new Collection($teams);
    }
}
