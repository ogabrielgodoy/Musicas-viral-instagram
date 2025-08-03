<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class SpotifyController extends Controller
{
    private $auth;
    private $baseuri;
    public function __construct()
    {
        $this->auth = "https://accounts.spotify.com/api/token";
        $this->baseuri = "https://api.spotify.com/v1/";
    }

    public function index()
    {
        $access_token = $this->getAccessToken();
        $playlistId = '0QrHnTrFHQfM5vzLbVc7HC';

        $response = Http::withToken($access_token)
            ->get($this->baseuri . "playlists/{$playlistId}/tracks", [
                'limit' => 50,
            ]);

        $items = $response->json()['items'];

        $tracks = collect($items)->map(function ($item) {
            $track = $item['track'];

            return [
                'name'        => $track['name'] ?? '',
                'artists'     => collect($track['artists'])->pluck('name')->all(),
                'album'       => $track['album']['name'] ?? '',
                'image'       => $track['album']['images'][2]['url'] ?? '',
                'duration'    => gmdate("i:s", ($track['duration_ms'] ?? 0) / 1000),
                'spotify'     => $track['external_urls']['spotify'] ?? '#',
                'popularity'  => $track['popularity'] ?? 0,
                'added_at'    => $item['added_at'] ?? now(),
            ];
        });


        return view('welcome', ['tracks' => $tracks]);
    }


    public function getAccessToken()
    {
        $response = Http::asForm()->post($this->auth, [
            'grant_type'    => 'client_credentials',
            'client_id'     => config('services.spotify.client_id'),
            'client_secret' => config('services.spotify.client_secret'),
        ]);

        return $response->json()['access_token'];
    }
}
