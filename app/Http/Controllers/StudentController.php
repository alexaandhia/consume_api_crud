<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Libraries\BaseApi;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        // selain pake new bisa pake BaseApi::
        $data = (new BaseApi)->index('/api/students', ['search_nama' => $search]);
        $students = $data->json();
        // dd($students);
        return view('index')->with(['students' => $students['data']]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'nis' => $request->nis,
            'rombel' => $request->rombel,
            'rayon' => $request->rayon,
        ];

        $proses = (new BaseApi)->store('/api/students/tambah-data', $data);
        if ($proses->failed()) {
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else{
            return redirect('/')->with('success', 'Berhasil menambahkan data baru ke students API');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = (new BaseApi)->edit('/api/students/'.$id);
        if ($data->failed()) {
            //kalo data gagal diproses, ambil desc error dri jason
            $errors = $data->json('data');
            //balik ke halaman awal serta kasi error
            return redirect()->back()->with(['errors' => $errors]);
        }else{
            //kalo berhasil ya alhamdulillah
            $student = $data->json('data');
            return view('edit')->with(['student' => $student]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //data yang mau dikirim ke rest API
        $payload = [
            'nama' => $request->nama,
            'nis' => $request->nis,
            'rombel' => $request->rombel,
            'rayon' => $request->rayon,
        ];

        //panggil method update dari BaseAPi kirim endpoint dari REST Api dan data $payload
        $proses = (new BaseApi)->update('/api/students/update/'.$id, $payload);
        if ($proses->failed()) {
            //kalo gagal ya error
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            //kalo berhasil alhamdulillah
            return redirect('/')->with('success', 'Edit Succeed!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proses = (new BaseApi)->delete('/api/students/delete/'.$id);
        if ($proses->failed()) {
            //kalo gagal ya error
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            //kalo berhasil alhamdulillah
            return redirect('/')->with('success', 'Delete Succeed!');
        }

    }

    public function trash()
    {
        $proses = (new BaseApi)->trash('/api/student/show/trash');
        
        if ($proses->failed()) {
            //kalo gagal ya error
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            //kalo berhasil alhamdulillah
            $trashdata = $proses->json('data');
            return view('trash')->with(['trashdata' => $trashdata]);

        }
    }

    public function permanent(string $id)
    {
        $proses = (new BaseApi)->permanent('/api/students/trash/delete/'.$id);
        
        if ($proses->failed()) {
            //kalo gagal ya error
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            //kalo berhasil alhamdulillah
            return redirect()->back()->with('success', 'Data deleted permanently');

        }
    }

    public function restore(string $id)
    {
        $restore = (new BaseApi)->restore('/api/students/trash/restore/'.$id);
        
        if ($restore->failed()) {
            $errors = $restore->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            return redirect('/')->with('success', 'data Restored');

        }
    }
}
