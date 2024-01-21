<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Pemohon extends Model
{
    protected $table = "pemohon";
    protected $fillable = ['nama_pemohon','alamat','tanggal_pelaporan','deskripsi','tanggal_selesai'];

    public function getTanggalPelaporanAttribute($value)
    {
        return Carbon::parse($value)->translatedFormat('l, d F Y');
    }

    public function getTanggalSelesaiAttribute($value)
    {
        return Carbon::parse($value)->translatedFormat('l, d F Y');
    }
}
