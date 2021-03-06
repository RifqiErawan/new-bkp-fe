<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Config;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('token.auth');
        $this->middleware('token.role:mahasiswa');
    }

    public function dashboard()
    {
        return view('mahasiswa.dashboard');
    }

    public function konseling(Request $request)
    {
    }

    public function konselingAll(Request $request)
    {
        try {
            $client = new Client();
            $token = $request->session()->get('credential')->token;
            $httpRequest = $client->get(Config::get('constants.api_base_url').'api/konseling/all', [
              'headers' => [
                  'Authorization' => 'bearer ' . $token,
              ],
              'form_params' => $request->except('_token')
            ]);
            $jsonResponse = $httpRequest->getBody();
            $response = json_decode($jsonResponse);
            $list_konseling = $response->result->list_konseling;
            $list_jadwal = array();

            foreach ($list_konseling as $key => $value) {
                $bgColor = '';
                if ($value->status == 'created') {
                    $bgColor = '#6c757d';
                    $textColor = '#ffffff';
                }
                if ($value->status == 'approved') {
                    $bgColor = '#007bff';
                    $textColor = '#ffffff';
                }
                if ($value->status == 'canceled') {
                    $bgColor = '#dc3545';
                    $textColor = '#ffffff';
                }
                if ($value->status == 'rescheduled-by-counselor' || $value->status == 'rescheduled-by-student' ) {
                    $bgColor = '#ffc107';
                    $textColor = '#000000';
                }
                if ($value->status == 'succeed') {
                    $bgColor = '#28a745';
                    $textColor = '#ffffff';
                }
                if ($value->status) {
                    array_push($list_jadwal, [
                        'title' => $value->konselor->nama,
                        'start' => $value->waktu_mulai,
                        'end' => $value->waktu_selesai,
                        'backgroundColor' => $bgColor,
                        'borderColor' => $bgColor,
                        'textColor' => $textColor,
                   ]);
                }
            }
            return view('mahasiswa.konseling.show', compact('list_jadwal'));
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
            return view('mahasiswa.profile', compact('profile'));
        } catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            echo $responseBodyAsString;
        }
    }

    public function create(Request $request)
    {
        try {
            $client = new Client();
            $token = $request->session()->get('credential')->token;
            $httpRequest = $client->get(Config::get('constants.api_base_url').'api/mahasiswa/konselor', [
              'headers' => [
                  'Authorization' => 'bearer ' . $token,
              ],
              'form_params' => $request->except('_token')
            ]);
            $jsonResponse = $httpRequest->getBody();
            $response = json_decode($jsonResponse);
            $listKonselor = $response->result->konselor;
            return view('mahasiswa.konseling.create', compact('listKonselor'));
        } catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            echo $responseBodyAsString;
        }
    }

    public function store(Request $request)
    {
        try {
            $client = new Client();
            $token = $request->session()->get('credential')->token;
            $httpRequest = $client->post(Config::get('constants.api_base_url').'api/mahasiswa/konseling/store', [
              'headers' => [
                  'Authorization' => 'bearer ' . $token,
              ],
              'form_params' => $request->except('_token')
            ]);
            $jsonResponse = $httpRequest->getBody();
            echo $jsonResponse;
            $response = json_decode($jsonResponse);
            return redirect()->route('mahasiswa.konseling');

        } catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            echo $responseBodyAsString;
        }
    }

    public function update(Request $request)
    {

    }

    public function history(Request $request)
    {
      try {
          $client = new Client();
          $token = $request->session()->get('credential')->token;
          $httpRequest = $client->post(Config::get('constants.api_base_url').'api/konseling/mahasiswa', [
            'headers' => [
                'Authorization' => 'bearer ' . $token,
            ],
            'form_params' => $request->except('_token')
          ]);
          $jsonResponse = $httpRequest->getBody();
          $response = json_decode($jsonResponse);
          $list_konseling = $response->result->konseling;
          return view('mahasiswa.konseling.history',compact('list_konseling'));
      } catch (GuzzleHttp\Exception\ClientException $e) {
          $response = $e->getResponse();
          $responseBodyAsString = $response->getBody()->getContents();
          echo $responseBodyAsString;
      }
    }
}
