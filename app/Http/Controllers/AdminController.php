<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Config;

class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('token.auth');
        $this->middleware('token.role:admin');

    }
    public function dashboard()
    {
    	return view('admin.dashboard');
    }

    public function createMahasiswa(Request $request)
    {
        $client = new Client();
        $httpRequest = $client->get(Config::get('constants.api_base_url').'api/program_studi/all');
        $jsonResponse = $httpRequest->getBody();
        $response = json_decode($jsonResponse);
        $listProgramStudi = $response->result->program_studi;
        $token = $request->session()->get('credential')->token;
        $httpRequest = $client->get(Config::get('constants.api_base_url').'api/wali_kelas/all', [
            'headers' => [
                'Authorization' => 'bearer ' . $token,
            ],
        ]);
        $jsonResponse = $httpRequest->getBody();
        $response = json_decode($jsonResponse);
        $listWaliKelas = $response->result->wali_kelas;
    	return view('admin.mahasiswa_create', compact('listWaliKelas', 'listProgramStudi'));
    }

    public function storeMahasiswa(Request $request)
    {
    	$this->validate($request, [
            'nim' => 'required|string|max:10',
            'nama' => 'required|string',
            'email' => 'required|email',
            'wali_kelas_id' => 'required|integer',
            'program_studi_id' => 'required|integer',
            'semester' => 'required|integer|gt:0|lt:8',
            'angkatan' => 'required|integer|gt:0',
            'ipk' => 'required|gt:0|lt:4',
        ]);

        try {
            $client = new Client();
            $token = $request->session()->get('credential')->token;
            $httpRequest = $client->post(Config::get('constants.api_base_url').'api/admin/mahasiswa/store', [
                'headers' => [
                    'Authorization' => 'bearer ' . $token,
                ],
                'form_params' => [
                    'nim' => $request->nim,
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'wali_kelas_id' => $request->wali_kelas_id,
                    'program_studi_id' => $request->program_studi_id,
                    'semester' => $request->semester,
                    'angkatan' => $request->angkatan,
                    'ipk' => $request->ipk,
                ],
            ]);
            $jsonResponse = $httpRequest->getBody();
            $response = json_decode($jsonResponse);
            $mahasiswa = $response->result->mahasiswa_data;
            return redirect()->route('admin.dashboard')->with('success', 'Mahasiswa berhasil ditambahkan');
        } catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            echo $responseBodyAsString;
        }

    }

    public function createPembantuDirektur3()
    {
    	return view('admin.pembantu_direktur_create');
    }

    public function storePembantuDirektur3(Request $request)
    {
    	$this->validate($request, [
            'nama' => 'required|string',
        ]);
        try {
            $client = new Client();
            $token = $request->session()->get('credential')->token;
            $httpRequest = $client->post(Config::get('constants.api_base_url').'api/admin/pembantu_direktur/store', [
                'headers' => [
                    'Authorization' => 'bearer ' . $token,
                ],
                'form_params' => [
                    'nama' => $request->nama,
                ],
            ]);
            $jsonResponse = $httpRequest->getBody();
            $response = json_decode($jsonResponse);
            $pd3 = $response->result->pd3_data;
            return redirect()->route('admin.dashboard')->with('success', 'Pembantu direktur berhasil ditambahkan');
        } catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            echo $responseBodyAsString;
        }
    }

    public function createPost()
    {
        return view('admin.post.create');
    }

    public function storePost(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'body' => 'required|string',
            'image' => 'required|string',
        ]);
        $image = Str::random(34);
        $request->file('image')->move(storage_path('posts'), $image);
        // $image = storage_path('image') . '/' . $name;
        // if (file_exists($image_path)) 
        // {
        //     $image = file_get_contents($image_path);
        //     return response($file, 200)->header('Content-Type', 'image/jpeg');
        // }
        try {
            $client = new Client();
            $token = $request->session()->get('credential')->token;
            $httpRequest = $client->post(Config::get('constants.api_base_url').'api/admin/posts/store', [
                'headers' => [
                    'Authorization' => 'bearer ' . $token,
                ],
                'form_params' => [
                    'title' => $request->title,
                    'body' => $request->body,
                    'image' => $request->image
                ],
            ]);
            $jsonResponse = $httpRequest->getBody();
            $response = json_decode($jsonResponse);
            $posts = $response->result->posts;
            return redirect()->route('admin.dashboard')->with('success', 'Artikel berhasil ditambahkan');
        } catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            echo $responseBodyAsString;
        }
    }
}
