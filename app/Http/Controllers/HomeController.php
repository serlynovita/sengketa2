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

        $all_tanggal_pelaporan = Pemohon::select('tanggal_pelaporan')->distinct()->orderBy('tanggal_pelaporan', 'ASC')->pluck('tanggal_pelaporan');
        $all_pemohon = Pemohon::select(Pemohon::raw('count(tanggal_pelaporan) as jumlah_lapor'))->groupBy('tanggal_pelaporan')->orderBy('tanggal_pelaporan', 'ASC')->pluck('jumlah_lapor');
    	
        $data_chart = [
            'labels' => $all_tanggal_pelaporan,
            'data' => $all_pemohon,
        ];

        return view('home', [
            'total_pemohon' => $total_pemohon,
            'total_pemohon_per_hari_ini_tgl_lapor' => $total_pemohon_per_hari_ini_tgl_lapor,
            'total_pemohon_per_hari_ini_tgl_selesai' => $total_pemohon_per_hari_ini_tgl_selesai,
            'total_teratas_pemohon' => $total_teratas_pemohon,
            'data_chart' => $data_chart,
        ]);
    }
}
