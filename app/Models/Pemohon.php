<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemohon extends Model
{
    protected $table = "pemohon";
    protected $fillable = ['nama_pemohon','alamat','tanggal_pelaporan','deskripsi','tanggal_selesai'];
}
