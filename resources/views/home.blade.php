@extends('layouts.app')

@section('content')
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row" style="display: inline-block;width:650px;">
    <div class="tile_count">
      <div class="col-md-4 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Pemohon</span>
        <div class="count">{{ $total_pemohon }}</div>
        <span class="count_bottom"><i class="green">Berdasarkan Tanggal Lapor</i></span>
      </div>
      <div class="col-md-4 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Pemohon Per Hari Ini</span>
        <div class="count">{{ $total_pemohon_per_hari_ini_tgl_lapor }}</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>Berdasarkan Tanggal Lapor</i></span>
      </div>
      <div class="col-md-4 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i>Total Pemohon Per Hari Ini</span>
        <div class="count">{{ $total_pemohon_per_hari_ini_tgl_selesai }}</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>Berdasarkan Tanggal Selesai</i></span>
      </div>
    </div>
  </div>
    <!-- /top tiles -->

    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="dashboard_graph">

          <div class="row x_title">
            <div class="col-md-6">
              <h3>Grafik Pemohon <small>Per Tanggal Lapor</small></h3>
            </div>
            {{-- <div class="col-md-6">
              <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                <i class="fa fa-calendar"></i>
                <span></span> <b class="caret"></b>
              </div>
            </div> --}}
          </div>

          <div class="col-md-9 col-sm-9 ">
            {{-- <div id="chart_plot_01" class="demo-placeholder"></div> --}}
            <div class="x_content">
              <canvas id="grafik_pemohon" height="100px"></canvas>
            </div>
          </div>
          <div class="col-md-3 col-sm-3  bg-white" style="margin-top: -%;">
            <div class="x_title">
              <h2>Total Teratas Pemohon</h2>
              <div class="clearfix"></div>
            </div>

            <div class="col-md-12 col-sm-12 ">
              @foreach($total_teratas_pemohon as $p)
              <div @if(!$loop->first)style="margin-top: 5%;"@endif>
                <p><b>{{ $p->tanggal_pelaporan }}</b></p>
                <div class="">
                  {{-- <div class="progress progress_sm" style="width: {{ $p->jumlah_lapor }}%;">
                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                  </div> --}}
                  <p>{{ $p->jumlah_lapor }} Pemohon</p>
                </div>
              </div>
              @endforeach
            </div>

          </div>

          <div class="clearfix"></div>
        </div>
      </div>

    </div>
</div>
@endsection

@section('extra_js')
<script>
  var e = document.getElementById("grafik_pemohon");
  new Chart(e, {
      type: "line",
      data: {
          labels: @json($data_chart['labels']),
          datasets: [
              {
                  label: "Data Pemohon",
                  backgroundColor: "rgba(38, 185, 154, 0.31)",
                  borderColor: "rgba(38, 185, 154, 0.7)",
                  pointBorderColor: "rgba(38, 185, 154, 0.7)",
                  pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
                  pointHoverBackgroundColor: "#fff",
                  pointHoverBorderColor: "rgba(220,220,220,1)",
                  pointBorderWidth: 1,
                  data: @json($data_chart['data']),
              },
          ],
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: false,
              callback: function(value) {if (value % 1 === 0) {return value;}}
            }
          }]
        }
      }
  });
</script>
@endsection
