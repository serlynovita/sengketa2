<!doctype html>
@extends('layouts.app')
@section('content')
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Portal Pengaduan Sengketa</small></h3>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Cari...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Cari</button>
              </span>
            </div>
          </div>
        </div>
      </div>
      
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">

              <p>Tabel Pemohon</p>

              <!-- start project list -->
              <table class="table table-striped projects">
                <thead>
                  <tr>
                    <th style="width: 1%">No</th>                  
                    <th>Nama Pemohon</th>
                    <th>Alamat Pemohon</th>
                    <th>Tanggal Pelaporan</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Selesai</th>
                    <th style="width: 20%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($pemohon as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->nama_pemohon }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td>{{ $p->tanggal_pelaporan }}</td>
                        <td>{{ $p->deskripsi }}</td>
                        <td>{{ $p->tanggal_selesai }}</td>
                        <td>
                            <a href="/pemohon/edit/{{ $p->id }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="/pemohon/hapus/{{ $p->id }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              <!-- end project list -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection