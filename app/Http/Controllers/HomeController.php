<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('API_URL')
        ]);

        $this->title = null;

        view()->share([
            'title' => $this->title,
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
            $this->title = "Sehat Q | Home Page";
            $getData = $this->getData();

            $category = current($getData)->data->category;
            $productPromo = current($getData)->data->productPromo;

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

    public function show($id) 
    {
        $this->title = "Sehat Q | Detail";
        $result = $this->getItemProduct($id);

        return view('detail')->with([
            'productPromo' => $result
        ]);
    }

    public function getData()
    {
        $req = $this->client->get('/home');

        $response = json_decode($req->getBody());

        return $response;
    }

    public function getItemProduct($id)
    {
        $getData = $this->getData();
        $productPromo = current($getData)->data->productPromo;

        foreach ($productPromo as $val) {
            if ($val->id == $id) {
                $result = $val;
            }
        }

        return $result;
    }

    public function buyItem($id)
    {
        $item = $this->getItemProduct($id);
        Session::push('cart', (array) $item);

        return redirect()->route('home');
    }
}
