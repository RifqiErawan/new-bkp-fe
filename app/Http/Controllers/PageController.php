<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Config;

class PageController extends Controller
{
    //
    public function index(){
        return view('index');
    }

    public function profile(Request $request){
        try {
            $client = new Client();
            $httpRequest = $client->get(Config::get('constants.api_base_url').'api/konselor/all', []);
            $jsonResponse = $httpRequest->getBody();
            $response = json_decode($jsonResponse);
            $list_konselor = $response->result->konselor;
            return view('profil', compact('list_konselor'));
        } catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            echo $responseBodyAsString;
        }
    }
}
