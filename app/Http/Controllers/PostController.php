<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Config;

class PostController extends Controller
{
    //
    public function index(){
        try {
            $client = new Client();
            $httpRequest = $client->get(Config::get('constants.api_base_url').'api/post/all', []);
            $jsonResponse = $httpRequest->getBody();
            $response = json_decode($jsonResponse);
            $posts = $response->result->post;
            return view('index', compact('posts'));
        } catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            echo $responseBodyAsString;
        }
    }

    public function get(Request $request){
        try {
            $client = new Client();
            $token = $request->session()->get('credential')->token;
            $httpRequest = $client->post(Config::get('constants.api_base_url').'api/post', [
                'headers' => [
                    'Authorization' => 'bearer ' . $token,
                ],
                'form_params' => $request->except('_token')
            ]);
            $jsonResponse = $httpRequest->getBody();
            $response = json_decode($jsonResponse);
            $posts = $response->result->post;
            return view('post',compact('posts'));
        } catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            echo $responseBodyAsString;
        }
    }
}
