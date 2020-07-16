<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Config;

class AuthenticationController extends Controller
{
    public function __construct()
    {
        $this->middleware('token.auth')->only('logout');
    }

    public function loginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $client = new Client();
        $httpRequest = $client->post(Config::get('constants.api_base_url').'api/login', [
            'form_params' => [
                'username' => $request->username,
                'password' => $request->password,
            ],
        ]);
        $jsonResponse = $httpRequest->getBody();
        $response = json_decode($jsonResponse);
        if($response->message == "Wrong credentials"){
            $message = "Wrong Credentials";
            return view('auth.login',compact('message'));
        }else{
            $request->session()->put('credential', $response->result->credential);
            $roles = array();
            $roles = $response->result->credential->user_data->roles;
            if($roles[0]->name == 'mahasiswa')
                return redirect()->route('mahasiswa.dashboard');
            elseif ($roles[0]->name == 'pembantu_direktur')
                return redirect()->route('pembantu_direktur.dashboard');
            elseif ($roles[0]->name == 'konselor')
                return redirect()->route('konselor.dashboard');
            else
                return redirect()->route('admin.dashboard');
        }
    }

    public function logout(Request $request){
        $token = $request->session()->get('credential')->token;
        $client = new Client();
        $httpRequest = $client->post(Config::get('constants.api_base_url').'api/logout', [
            'headers' => [
                'Authorization' => 'bearer ' . $token,
            ],
        ]);
        $request->session()->forget('credential');
        return redirect()->route('auth.login_form');
    }
}
