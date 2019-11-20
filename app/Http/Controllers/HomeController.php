<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->client = new Client([
            'base_uri' => env('API_URL')
        ]);

        view()->share([
            'title' => "Sehat Q | Home Page",
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
            $req = $this->client->get('/home');

            $res = json_decode($req->getBody());
            $category = current($res)->data->category;
            $productPromo = current($res)->data->productPromo;

            return view('home')->with([
                'category' => $category,
                'productPromo' => $productPromo
            ]);
        } catch (RequestException $e) {
            echo Psr7\str($e->getRequest());

            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }
    }
}
