<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Config;

class PembantuDirekturController extends Controller
{
    public function __construct()
    {
        $this->middleware('token.auth');
        $this->middleware('token.role:pd3');

    }

    public function dashboard()
    {
    	return view('pembantu_direktur.dashboard');
    }

    // public function pendaftarBeasiswa($id, Request $request)
    // {
    // 	try {
    //         $client = new Client();
    //         $token = $request->session()->get('credential')->token;
    //         $httpRequest = $client->get(Config::get('constants.api_base_url').'api/beasiswa/pendaftar', [
    //             'headers' => [
    //                 'Authorization' => 'bearer ' . $token,
    //             ],
    //             'query' => [
    //             	'beasiswa_id' => $id
    //             ]
    //         ]);
    //         $jsonResponse = $httpRequest->getBody();
    //         $response = json_decode($jsonResponse);
    //         $pendaftarBeasiswa = $response->result->pendaftar_beasiswa;
    //         echo json_encode($pendaftarBeasiswa);
    //         // return redirect()->route('pembantu_direktur_3.dashboard')->with('success', 'Kuota beasiswa berhasil diedit');
    //     } catch (GuzzleHttp\Exception\ClientException $e) {
    //         $response = $e->getResponse();
    //         $responseBodyAsString = $response->getBody()->getContents();
    //         echo $responseBodyAsString;
    //     }
    // }
    //
    // public function penerimaanBeasiswa($id, Request $request)
    // {
    // 	try {
    //         $client = new Client();
    //         $token = $request->session()->get('credential')->token;
    //         $httpRequest = $client->post(Config::get('constants.api_base_url').'api/beasiswa/pendaftar/penilaian', [
    //             'headers' => [
    //                 'Authorization' => 'bearer ' . $token,
    //             ],
    //             'form_params' => [
    //             	'beasiswa_id' => $id
    //             ]
    //         ]);
    //         $jsonResponse = $httpRequest->getBody();
    //         $response = json_decode($jsonResponse);
    //         // $pendaftarBeasiswa = $response->result->pendaftar_beasiswa;
    //         // echo json_encode($pendaftarBeasiswa);
    //         return redirect()->route('pembantu_direktur_3.dashboard')->with('success', 'Kuota beasiswa berhasil diedit');
    //     } catch (GuzzleHttp\Exception\ClientException $e) {
    //         $response = $e->getResponse();
    //         $responseBodyAsString = $response->getBody()->getContents();
    //         echo $responseBodyAsString;
    //     }
    // }
    //
    // public function penyelesaianBeasiswa($id, Request $request)
    // {
    // 	try {
    //         $client = new Client();
    //         $token = $request->session()->get('credential')->token;
    //         $httpRequest = $client->post(Config::get('constants.api_base_url').'api/beasiswa/penyelesaian', [
    //             'headers' => [
    //                 'Authorization' => 'bearer ' . $token,
    //             ],
    //             'form_params' => [
    //             	'beasiswa_id' => $id
    //             ]
    //         ]);
    //         $jsonResponse = $httpRequest->getBody();
    //         $response = json_decode($jsonResponse);
    //         $pendaftarBeasiswa = $response->result->pendaftar_beasiswa;
    //         // echo json_encode($pendaftarBeasiswa);
    //         return redirect()->route('pembantu_direktur_3.dashboard')->with('success', 'Kuota beasiswa berhasil diedit');
    //     } catch (GuzzleHttp\Exception\ClientException $e) {
    //         $response = $e->getResponse();
    //         $responseBodyAsString = $response->getBody()->getContents();
    //         echo $responseBodyAsString;
    //     }
    // }
}
