<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Pemohon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_pemohon = Pemohon::all()->count();
        $total_pemohon_per_hari_ini_tgl_lapor = Pemohon::where('tanggal_pelaporan', Carbon::today())->count();
        $total_pemohon_per_hari_ini_tgl_selesai = Pemohon::where('tanggal_selesai', Carbon::today())->count();
        $total_teratas_pemohon = Pemohon::select('tanggal_pelaporan', Pemohon::raw('count(tanggal_pelaporan) as jumlah_lapor'))->groupBy('tanggal_pelaporan')->orderBy('jumlah_lapor', 'DESC')->take(4)->get();
    	return view('home', [
            'total_pemohon' => $total_pemohon,
            'total_pemohon_per_hari_ini_tgl_lapor' => $total_pemohon_per_hari_ini_tgl_lapor,
            'total_pemohon_per_hari_ini_tgl_selesai' => $total_pemohon_per_hari_ini_tgl_selesai,
            'total_teratas_pemohon' => $total_teratas_pemohon,
        ]);
    }
}
