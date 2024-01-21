<!doctype html>
@extends('layouts.app')
@section('content')
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Portal Pengaduan Sengketa</small></h3>
        </div>
      </div>
      
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">

              <p>Tabel Pemohon</p>

              <!-- start project list -->
              <table id="tabel_sengketa" class="table table-striped projects">
                <thead>
                  <tr>
                    <th style="width: 1%">No</th>                  
                    <th>Nama Pemohon</th>
                    <th>Alamat Pemohon</th>
                    <th>Tanggal Pelaporan</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Selesai</th>
                    <th style="width: 21%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($pemohon as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->nama_pemohon }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td>{{ $p->tanggal_pelaporan_locale_id }}</td>
                        <td>{{ $p->deskripsi }}</td>
                        <td>{{ $p->tanggal_selesai_locale_id }}</td>
                        <td>
                            <a href="/pemohon/edit/{{ $p->id }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            {{-- <a href="/pemohon/hapus/{{ $p->id }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus </a> --}}
                            <a onclick="hapusPemohon({{ $p->id }})" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus </a>
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

@section('extra_js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  var APP_URL = {!! json_encode(url('/')) !!}

  tabel_sengketa = $('#tabel_sengketa').DataTable({
    dom: '<"container-fluid"<"row"<"col-md-6"l><"col-md-4"f><"col-md-2"B>>>rtip',
    buttons: [
      {
         extend: 'pdf',
         text: '<i class="fa fa-download"> Download PDF',
         className: 'btn btn-success',
         exportOptions: {
            columns: 'th:not(:last-child)'
         }
      }
    ]
  });

  function hapusPemohon(id_pemohon) {
    Swal.fire({
      title: "Apakah anda yakin ingin menghapus?",
      text: "Anda tidak akan dapat mengembalikan data ini!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Ya, hapus!"
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: "Terhapus!",
          text: "Data anda telah terhapus.",
          icon: "success"
        });
        window.location.href = APP_URL+"/pemohon/hapus/"+id_pemohon
      }
    });
  }
</script>
@endsection