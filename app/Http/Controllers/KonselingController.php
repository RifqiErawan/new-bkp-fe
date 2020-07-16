<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Config;

class KonselingController extends Controller
{
	public function __construct()
    {
        $this->middleware('token.auth')->except('index', 'show', 'getActiveBeasiswa');
        $this->middleware('token.role:pd3')->except('index', 'show', 'getActiveBeasiswa');

    }

    public function index(){
        try {
            $client = new Client();
            $httpRequest = $client->get(Config::get('constants.api_base_url').'api/konseling/all');
            $jsonResponse = $httpRequest->getBody();
            $response = json_decode($jsonResponse);
            $listBeasiswa = $response->result->list_beasiswa;
            return view('beasiswa.index', compact('listBeasiswa'));
        } catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            echo $responseBodyAsString;
        }
    }

    public function show($id)
    {
        try {
            $client = new Client();
            $httpRequest = $client->get(Config::get('constants.api_base_url').'api/beasiswa/', [
	            'query' => [
	                'beasiswa_id' => $id,
	            ],
        	]);
            $jsonResponse = $httpRequest->getBody();
            $response = json_decode($jsonResponse);
            $beasiswa = $response->result->beasiswa;
            return view('beasiswa.show', compact('beasiswa'));
        } catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            echo $responseBodyAsString;
        }
    }

    public function getActiveBeasiswa(){
        try {
            $client = new Client();
            $httpRequest = $client->get(Config::get('constants.api_base_url').'api/beasiswa/active');
            $jsonResponse = $httpRequest->getBody();
            $response = json_decode($jsonResponse);
            $listBeasiswa = $response->result->list_beasiswa;
            return view('beasiswa.index', compact('listBeasiswa'));
        } catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            echo $responseBodyAsString;
        }
    }

    public function create()
    {
    	return view('mahasiswa.konseling_create');
    }

    public function store(Request $request){
    	$this->validate($request, [
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'awal_pendaftaran' => 'required|date|before:akhir_pendaftaran',
            'akhir_pendaftaran' => 'required|date|after:awal_pendaftaran',
            'awal_penerimaan' => 'required|date|after:awal_pendaftaran|after:akhir_pendaftaran|before:akhir_penerimaan',
            'akhir_penerimaan' => 'required|date|after:awal_pendaftaran|after:akhir_pendaftaran|after:awal_penerimaan',
            'biaya_pendidikan_per_semester' => 'required|integer',
            'penghasilan_orang_tua_maksimal' => 'required|integer',
            'ipk_minimal' => 'required'
        ]);
        try {
            $client = new Client();
            $token = $request->session()->get('credential')->token;
            $httpRequest = $client->post(Config::get('constants.api_base_url').'api/beasiswa/store', [
                'headers' => [
                    'Authorization' => 'bearer ' . $token,
                ],
                'form_params' => $request->except('_token')
            ]);
            $jsonResponse = $httpRequest->getBody();
            $response = json_decode($jsonResponse);
            $mahasiswa = $response->result->beasiswa;
            return redirect()->route('pembantu_direktur_3.dashboard')->with('success', 'Beasiswa berhasil ditambahkan');
        } catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            echo $responseBodyAsString;
        }
    }

    public function edit($id)
    {
        try {
            $client = new Client();
            $httpRequest = $client->get(Config::get('constants.api_base_url').'api/beasiswa/', [
                'query' => [
                    'beasiswa_id' => $id,
                ],
            ]);
            $jsonResponse = $httpRequest->getBody();
            $response = json_decode($jsonResponse);
            $beasiswa = $response->result->beasiswa;
            return view('beasiswa.edit', compact('beasiswa'));
        } catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            echo $responseBodyAsString;
        }
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'nama' => 'string',
            'deskripsi' => 'string',
            'awal_pendaftaran' => 'date|before:akhir_pendaftaran',
            'akhir_pendaftaran' => 'date|after:awal_pendaftaran',
            'awal_penerimaan' => 'date|after:awal_pendaftaran|after:akhir_pendaftaran|before:akhir_penerimaan',
            'akhir_penerimaan' => 'date|after:awal_pendaftaran|after:akhir_pendaftaran|after:awal_penerimaan',
            'biaya_pendidikan_per_semester' => 'integer',
            'penghasilan_orang_tua_maksimal' => 'integer',
            // 'ipk_minimal' => 'required'
        ]);
        try {
            $client = new Client();
            $token = $request->session()->get('credential')->token;
            $form_params = $request->except('_token', '_method');
            $form_params['beasiswa_id'] = $id;
            $httpRequest = $client->put(Config::get('constants.api_base_url').'api/beasiswa/update', [
                'headers' => [
                    'Authorization' => 'bearer ' . $token,
                ],
                'form_params' => $form_params
            ]);
            $jsonResponse = $httpRequest->getBody();
            $response = json_decode($jsonResponse);
            $mahasiswa = $response->result->beasiswa;
            return redirect()->route('pembantu_direktur_3.dashboard')->with('success', 'Beasiswa berhasil diupdate');
        } catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            echo $responseBodyAsString;
        }
    }

    public function destroy($id, Request $request)
    {
        try {
            $client = new Client();
            $token = $request->session()->get('credential')->token;
            $httpRequest = $client->post(Config::get('constants.api_base_url').'api/beasiswa/destroy', [
                'headers' => [
                    'Authorization' => 'bearer ' . $token,
                ],
                'form_params' => [
                    'beasiswa_id' => $id
                ]
            ]);
            $jsonResponse = $httpRequest->getBody();
            $response = json_decode($jsonResponse);
            $mahasiswa = $response;
            return redirect()->route('pembantu_direktur_3.dashboard')->with('success', 'Beasiswa berhasil dihapus');
        } catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            echo $responseBodyAsString;
        }
    }

    public function createKuota($beasiswa_id)
    {
        try {
            $client = new Client();
            $httpRequest = $client->get(Config::get('constants.api_base_url').'api/beasiswa',[
                'query' => [
                    'beasiswa_id' => $beasiswa_id
                ]
            ]);
            $jsonResponse = $httpRequest->getBody();
            $response = json_decode($jsonResponse);
            $beasiswa = $response->result->beasiswa;
            $client = new Client();
            $httpRequest = $client->get(Config::get('constants.api_base_url').'api/program_studi/all');
            $jsonResponse = $httpRequest->getBody();
            $response = json_decode($jsonResponse);
            $listProgramStudi = $response->result->program_studi;
            return view('beasiswa.create_kuota', compact('beasiswa', 'listProgramStudi'));
        } catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            echo $responseBodyAsString;
        }
    }

    public function storeKuota(Request $request)
    {
        $this->validate($request, [
            'beasiswa_id' => 'required|integer',
            'program_studi_id' => 'required|integer',
            'angkatan' => 'required|integer',
            'kuota' => 'required|integer',
        ]);
        try {
            $client = new Client();
            $token = $request->session()->get('credential')->token;
            $form_params = $request->except('_token');
            $httpRequest = $client->post(Config::get('constants.api_base_url').'api/beasiswa/kuota/store', [
                'headers' => [
                    'Authorization' => 'bearer ' . $token,
                ],
                'form_params' => $form_params
            ]);
            $jsonResponse = $httpRequest->getBody();
            $response = json_decode($jsonResponse);
            $beasiswa = $response->result->beasiswa;
            return redirect()->route('pembantu_direktur_3.dashboard')->with('success', 'Kuota beasiswa berhasil ditambahkan');
        } catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            echo $responseBodyAsString;
        }
    }

    public function editKuota($beasiswa_id, $program_studi_id, $angkatan, Request $request)
    {
        try {
            $client = new Client();
            $token = $request->session()->get('credential')->token;
            $httpRequest = $client->get(Config::get('constants.api_base_url').'api/beasiswa/kuota', [
                'headers' => [
                    'Authorization' => 'bearer ' . $token,
                ],
                'query' => [
                    'beasiswa_id' => $beasiswa_id,
                    'program_studi_id' => $program_studi_id,
                    'angkatan' => $angkatan
                ]
            ]);
            $jsonResponse = $httpRequest->getBody();
            $response = json_decode($jsonResponse);
            $kuotaBeasiswa = $response->result->kuota_beasiswa;
            return view('pembantu_direktur_3.beasiswa_kuota_edit', compact('kuotaBeasiswa'));
        } catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            echo $responseBodyAsString;
        }
    }

    public function updateKuota(Request $request)
    {
        $this->validate($request, [
            'beasiswa_id' => 'required|integer',
            'program_studi_id' => 'required|integer',
            'angkatan' => 'required|integer',
            'kuota' => 'required|integer',
        ]);
        try {
            $client = new Client();
            $token = $request->session()->get('credential')->token;
            $form_params = $request->except('_token, _method');
            $httpRequest = $client->put(Config::get('constants.api_base_url').'api/beasiswa/kuota/update', [
                'headers' => [
                    'Authorization' => 'bearer ' . $token,
                ],
                'form_params' => $form_params
            ]);
            $jsonResponse = $httpRequest->getBody();
            $response = json_decode($jsonResponse);
            $beasiswa = $response->result->beasiswa;
            return redirect()->route('pembantu_direktur_3.dashboard')->with('success', 'Kuota beasiswa berhasil diedit');
        } catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            echo $responseBodyAsString;
        }
    }

    public function destroyKuota($beasiswa_id, $program_studi_id, $angkatan, Request $request)
    {
        try {
            $client = new Client();
            $token = $request->session()->get('credential')->token;
            $httpRequest = $client->post(Config::get('constants.api_base_url').'api/beasiswa/kuota/destroy', [
                'headers' => [
                    'Authorization' => 'bearer ' . $token,
                ],
                'form_params' => [
                    'beasiswa_id' => $beasiswa_id,
                    'program_studi_id' => $program_studi_id,
                    'angkatan' => $angkatan
                ]
            ]);
            $jsonResponse = $httpRequest->getBody();
            $response = json_decode($jsonResponse);
            // $beasiswa = $response->result->beasiswa;
            return redirect()->route('pembantu_direktur_3.dashboard')->with('success', 'Kuota beasiswa berhasil dihapus');
        } catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            echo $responseBodyAsString;
        }
    }
}
