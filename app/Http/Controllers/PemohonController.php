<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemohon;

class PemohonController extends Controller
{
    public function index()
    {
    	// mengambil data pemohon
    	$pemohon = Pemohon::all();
 
    	// mengirim data pemohon ke view pemohon
    	return view('pemohon', ['pemohon' => $pemohon]);
    }

    public function tambah()
    {
    	return view('pemohon_tambah');
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'nama_pemohon' => 'required',
            'alamat' => 'required',
    		'tanggal_pelaporan' => 'required',
            'deskripsi'=> 'required',
            'tanggal_selesai'=> 'required'
    	]);
 
        Pemohon::create([
    		'nama_pemohon' => $request->nama_pemohon,
            'alamat' => $request->alamat,
    		'tanggal_pelaporan' => $request->tanggal_pelaporan,
            'deskripsi'=> $request-> deskripsi,
            'tanggal_selesai'=>$request ->tanggal_selesai
    	]);
 
    	return redirect('/pemohon');
    }
    
    public function edit($id)
    {
        $pemohon = Pemohon::find($id);
        return view('pemohon_edit', ['pemohon' => $pemohon]);
    }

    public function update($id, Request $request)
    {
    $this->validate($request,[
        'nama_pemohon' => 'required',
        'alamat' => 'required',
        'tanggal_pelaporan' => 'required',
        'deskripsi'=> 'required',
        'tanggal_selesai'=> 'required'
    ]);
 
    $pemohon = Pemohon::find($id);
    $pemohon->nama_pemohon = $request->nama_pemohon;
    $pemohon->alamat = $request->alamat;
    $pemohon->tanggal_pelaporan = $request->tanggal_pelaporan;
    $pemohon->deskripsi = $request->deskripsi;
    $pemohon->tanggal_selesai = $request->tanggal_selesai;
    $pemohon->save();
    return redirect('/pemohon');
    }

    public function delete($id)
    {
    $pemohon = Pemohon::find($id);
    $pemohon->delete();
    return redirect('/pemohon');
    }
}
