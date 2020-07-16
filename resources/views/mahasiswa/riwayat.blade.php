@extends('template.mahasiswa')
@include('mahasiswa.sidebar')
@section('title','| Mahasiswa - Konseling')

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
  <!-- <link rel="stylesheet" href="{{asset('assets/admin-lte/dist/css/adminlte.min.css')}}"> -->
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
            <h1>Jadwal Konseling</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Konseling</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
					<div class="col-md-9">
						<div class="card card-primary">
							<div class="card-body p-0">
								<!-- THE CALENDAR -->
								<div id="calendar"></div>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
					<!-- /.col -->
          <div class="col-md-3">
            <div class="sticky-top mb-3">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Status</h4>
                    </div>
                    <div class="card-body">
                      <!-- the events -->
                      <div id="external-events">
    										<div class="external-event bg-secondary">Belum Dikonfirmasi</div>
    										<div class="external-event bg-primary">Telah Dikonfirmasi</div>
    										<div class="external-event bg-danger">Dibatalkan</div>
    										<div class="external-event bg-warning">Dijadwalkan Ulang</div>
                        <div class="external-event bg-success">Selesai</div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Konseling</h4>
                    </div>
                    <div class="card-body">
                      <a class="btn btn-primary" href="{{route('mahasiswa.konseling.create')}}">Buat Pertemuan</a>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Kendala</h4>
                    </div>
                    <div class="card-body">
                      <a class="" href="">Laporkan Kendala</a>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('javascript')

@endsection
