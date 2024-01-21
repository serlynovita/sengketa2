<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Pemohon extends Model
{
    protected $table = "pemohon";
    protected $fillable = ['nama_pemohon','alamat','tanggal_pelaporan','deskripsi','tanggal_selesai'];

    public function getTanggalPelaporanLocaleIdAttribute()
    {
        return Carbon::parse($this->tanggal_pelaporan)->translatedFormat('l, d F Y');
    }

    public function getTanggalSelesaiLocaleIdAttribute($value)
    {
        return Carbon::parse($this->tanggal_selesai)->translatedFormat('l, d F Y');
    }
}
