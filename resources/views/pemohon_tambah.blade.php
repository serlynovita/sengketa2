<!doctype html>
@extends('layouts.app')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Portal Pengaduan Sengketa</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Tambah Pemohon</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form method="post" action="/pemohon/store">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama_pemohon" class="form-control" placeholder="Nama pemohon ..">
        
                                @if($errors->has('nama_pemohon'))
                                    <div class="text-danger">
                                        {{ $errors->first('nama_pemohon')}}
                                    </div>
                                @endif
        
                            </div>
                            
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" placeholder="Alamat Pemohon .."></textarea>
    
                                @if($errors->has('alamat'))
                                    <div class="text-danger">
                                        {{ $errors->first('alamat')}}
                                    </div>
                                @endif
    
                            </div>
    
                            <div class="form-group">
                                <label>Tanggal Pelaporan</label>
                                <input type="date" name="tanggal_pelaporan" class="form-control" placeholder="Tanggal Pelaporan Pemohon ..">
    
                                @if($errors->has('tanggal_pelaporan'))
                                    <div class="text-danger">
                                        {{ $errors->first('tanggal_pelaporan')}}
                                    </div>
                                @endif
    
                            </div>

                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Pemohon .."></textarea>
    
                                @if($errors->has('deskripsi'))
                                    <div class="text-danger">
                                        {{ $errors->first('deskrispi')}}
                                    </div>
                                @endif
    
                            </div>

                            <div class="form-group">
                                <label>Tanggal Selesai</label>
                                <input type="date" name="tanggal_selesai" class="form-control" placeholder="Tanggal Selesai Pemohon ..">
    
                                @if($errors->has('tanggal_selesai'))
                                    <div class="text-danger">
                                        {{ $errors->first('tanggal_selesai')}}
                                    </div>
                                @endif
    
                            </div>
                            
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <a href="{{ route('pemohon-tambah') }}" class="btn btn-primary" type="button">Cancel</a>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection