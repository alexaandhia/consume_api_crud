<?php

namespace App\Http\Libraries;

use Illuminate\Support\Facades\Http;

class BaseApi
{
    //variabel yang cuma bisa diakses di class ini dann turunannya
    protected $baseUrl;
    //constructor: untuk menyiapkan isi data, dijalankan otomatis tanpa dipanggil
    public function __construct()
    {
        //variabel $baseUrl diisi nilainya dari isian file .env bagian API_HOST
        //var ini diisi otomatis ketika file/class BaseApi dipanggil di controller
        $this->baseUrl = "http://127.0.0.1:1818";
    }
    private function client()
    {
        //koneksikan ip dari variabel $baseUrl ke dependency Http
        //menggunakan depedency (kaya package cuma lebih dikit) Http karena project API nya berbasis web (protocol Http)
        return Http::baseUrl($this->baseUrl);
    }
    public function index(String $endpoint, Array $data = [])
    {
        //manggil ke client, lalu ke path yang dari endpoint yang dikirim controllernya
        return $this->client()->get($endpoint, $data);
    }

    public function store(String $endpoint, Array $data = []){
        // pake post karena buat route tambah data di project Rest API pke post
        return $this->client()->post($endpoint, $data);
    }

    public function edit(String $endpoint, Array $data = []){
        return $this->client()->get($endpoint, $data);
    }

    public function update(String $endpoint, Array $data = []){
        return $this->client()->patch($endpoint, $data);
    }

    public function delete(String $endpoint, Array $data = []){
        return $this->client()->delete($endpoint, $data);
    }

    public function trash(String $endpoint, Array $data = []){
        return $this->client()->get($endpoint, $data);
    }

    public function restore(String $endpoint, Array $data = []){
        return $this->client()->get($endpoint, $data);
    }
    
    public function permanent(String $endpoint, Array $data = []){
        return $this->client()->get($endpoint, $data);
    }
}
?>