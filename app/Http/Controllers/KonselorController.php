<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Config;

class KonselorController extends Controller
{
    public function __construct()
    {
        $this->middleware('token.auth');
        $this->middleware('token.role:konselor');
    }

    public function dashboard()
    {
        return view('konselor.dashboard');
    }

    public function show(Request $request)
    {
      try {
          $client = new Client();
          $token = $request->session()->get('credential')->token;
          $httpRequest = $client->post(Config::get('constants.api_base_url').'api/konseling/one', [
            'headers' => [
                'Authorization' => 'bearer ' . $token,
            ],
            'form_params' => $request->except('_token')
          ]);
          $jsonResponse = $httpRequest->getBody();
          $response = json_decode($jsonResponse);
          // echo $jsonResponse;
          $konseling = $response->result->konseling;
          return view('konselor.konseling.showone', compact('konseling'));
      } catch (GuzzleHttp\Exception\ClientException $e) {
          $response = $e->getResponse();
          $responseBodyAsString = $response->getBody()->getContents();
          echo $responseBodyAsString;
      }
    }

    public function konselingAll(Request $request)
    {
        try {
            $client = new Client();
            $token = $request->session()->get('credential')->token;
            $httpRequest = $client->post(Config::get('constants.api_base_url').'api/konseling/konselor', [
              'headers' => [
                  'Authorization' => 'bearer ' . $token,
              ],
              'form_params' => $request->except('_token')
            ]);
            $jsonResponse = $httpRequest->getBody();
            $response = json_decode($jsonResponse);
            $list_konseling = array();
            if(!isset($response)) return redirect()->route('home');
            else $list_konseling = $response->result->konseling;

            $list_jadwal = array();
            foreach ($list_konseling as $key => $value) {
                $bgColor = '';
                if ($value->status == 'created') {
                    $bgColor = '#6c757d';
                }
                if ($value->status == 'approved') {
                    $bgColor = '#007bff';
                }
                if ($value->status == 'canceled') {
                    $bgColor = '#dc3545';
                }
                if ($value->status == 'rescheduled') {
                    $bgColor = '#ffc107';
                }
                if ($value->status == 'succeed') {
                    $bgColor = '#28a745';
                }
                if ($value->status) {
                    array_push($list_jadwal, [
                       'title' => $value->mahasiswa->nama,
                       'start' => $value->waktu_mulai,
                       'end' => $value->waktu_selesai,
                       'backgroundColor' => $bgColor,
                       'borderColor' => $bgColor
                   ]);
                }
            }
            return view('konselor.konseling.show', compact('list_jadwal','list_konseling'));
        } catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            echo $responseBodyAsString;
        }
    }

    public function profile(Request $request)
    {
        try {
            $client = new Client();
            $token = $request->session()->get('credential')->token;
            $httpRequest = $client->get(Config::get('constants.api_base_url').'api/user/profile', [
              'headers' => [
                  'Authorization' => 'bearer ' . $token,
              ],
              'form_params' => $request->except('_token')
            ]);
            $jsonResponse = $httpRequest->getBody();
            $response = json_decode($jsonResponse);
            $profile = $response->result->user_data->profile;
            return view('konselor.profile', compact('profile'));
        } catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            echo $responseBodyAsString;
        }
    }

    public function create(Request $request)
    {
        // try {
        //     $client = new Client();
        //     $token = $request->session()->get('credential')->token;
        //     $httpRequest = $client->get(Config::get('constants.api_base_url').'api/mahasiswa/konselor', [
        //       'headers' => [
        //           'Authorization' => 'bearer ' . $token,
        //       ],
        //       'form_params' => $request->except('_token')
        //     ]);
        //     $jsonResponse = $httpRequest->getBody();
        //     $response = json_decode($jsonResponse);
        //     $listKonselor = $response->result->konselor;
        //     return view('mahasiswa.konseling.create', compact('listKonselor'));
        // } catch (GuzzleHttp\Exception\ClientException $e) {
        //     $response = $e->getResponse();
        //     $responseBodyAsString = $response->getBody()->getContents();
        //     echo $responseBodyAsString;
        // }
    }

    public function store(Request $request)
    {
        // try {
        //     $client = new Client();
        //     $token = $request->session()->get('credential')->token;
        //     $httpRequest = $client->post(Config::get('constants.api_base_url').'api/mahasiswa/konseling/store', [
        //       'headers' => [
        //           'Authorization' => 'bearer ' . $token,
        //       ],
        //       'form_params' => $request->except('_token')
        //     ]);
        //     $jsonResponse = $httpRequest->getBody();
        //     $response = json_decode($jsonResponse);
        //     return redirect()->route('mahasiswa.konseling');
        //
        // } catch (GuzzleHttp\Exception\ClientException $e) {
        //     $response = $e->getResponse();
        //     $responseBodyAsString = $response->getBody()->getContents();
        //     echo $responseBodyAsString;
        // }
    }

    public function update(Request $request)
    {
      try {
          $client = new Client();
          $token = $request->session()->get('credential')->token;
          $httpRequest = $client->put(Config::get('constants.api_base_url').'api/konseling/updatebykonselor', [
            'headers' => [
                'Authorization' => 'bearer ' . $token,
            ],
            'form_params' => $request->except('_token')
          ]);
          // $jsonResponse = $httpRequest->getBody();
          // echo $jsonResponse;
          // $response = json_decode($jsonResponse);
          return redirect()->route('konselor.konseling');
      } catch (GuzzleHttp\Exception\ClientException $e) {
          $response = $e->getResponse();
          $responseBodyAsString = $response->getBody()->getContents();
          echo $responseBodyAsString;
      }
    }

    public function history(Request $request)
    {
      try {
          $client = new Client();
          $token = $request->session()->get('credential')->token;
          $httpRequest = $client->post(Config::get('constants.api_base_url').'api/konseling/konselor', [
            'headers' => [
                'Authorization' => 'bearer ' . $token,
            ],
            'form_params' => $request->except('_token')
          ]);
          $jsonResponse = $httpRequest->getBody();
          $response = json_decode($jsonResponse);
          $list_konseling = $response->result->konseling;
          return view('konselor.konseling.history',compact('list_konseling'));
      } catch (GuzzleHttp\Exception\ClientException $e) {
          $response = $e->getResponse();
          $responseBodyAsString = $response->getBody()->getContents();
          echo $responseBodyAsString;
      }
    }
}
