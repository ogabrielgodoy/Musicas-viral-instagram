<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use PhpParser\Node\Expr\Cast\Object_;

class SpotifyController extends Controller
{

    private $baseuri;

    public function __construct()
    {
        $this->baseuri = "https://accounts.spotify.com/api/token";
    }

    public function getAccessToken()
    {
        $response = Http::asForm()->post($this->baseuri, [
            'grant_type'    => 'client_credentials',
            'client_id'     => config('services.spotify.client_id'),
            'client_secret' => config('services.spotify.client_secret'),
        ]);

        return view('generetetoken', [
            'status' => $response->status(),
            'response' => $response->json(),
            'success' => $response->successful()
        ]);
    }

}
