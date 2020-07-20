@extends('template.pembantu_direktur')
@include('pembantu_direktur.sidebar')
@section('title','| Pembantu Direktur - Dashboard')
@section('stylesheet')
  <link rel="stylesheet" href="{{asset('assets/admin-lte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="{{asset('assets/admin-lte/plugins/fullcalendar/main.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin-lte/plugins/fullcalendar-interaction/main.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin-lte/plugins/fullcalendar-daygrid/main.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin-lte/plugins/fullcalendar-timegrid/main.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin-lte/plugins/fullcalendar-bootstrap/main.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/admin-lte/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">
                Selamat Datang
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Laporan Kegiatan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table id="riwayat" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                        <th>Nama Klien</th>
                        <th>Nama Konselor</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(($list_konseling) as $konseling)
                          <tr>
                          <td>{{$konseling->mhs_id}}</td>
                          <td>{{$konseling->konselor->nama}}</td>
                          <td>{{$konseling->waktu_mulai}}</td>
                          <td>{{$konseling->waktu_selesai}}</td>
                          <td>
                              <a href="#" class="btn btn-secondary">Lihat</a>
                          </td>
                          </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                </div>
                </div>
                </div>
                </div><!-- /.container-fluid -->
            </section>
            </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('javascript')

@endsection