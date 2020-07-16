@extends('template.konselor')
@include('konselor.sidebar')

@section('title','| Konselor - Profile')

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
            <h1>User Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('mahasiswa.dashboard')}}">Mahasiswa</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
					<div class="col-md-6">
						<div class="card card-primary">
							<div class="card-body p-3">

                            <div class="row"><div class="col-md-6">NIP</div><div class"col-md-6">: {{$profile->nip}}</div></div>
                            <div class="row"><div class="col-md-6">Nama</div><div class"col-md-6">: {{$profile->nama}}</div></div>
                            <div class="row"><div class="col-md-6">Program Studi</div><div class"col-md-6">: {{$profile->program_studi_id}}</div></div>
                            <div class="row"><div class="col-md-6">Tempat & Tangal Lahir</div><div class"col-md-6">: {{$profile->tempat_lahir}}, {{$profile->tanggal_lahir}}</div></div>
                            <div class="row"><div class="col-md-6">Jenis Kelamin</div><div class"col-md-6">: {{$profile->gender}}</div></div>
                            <div class="row"><div class="col-md-6">No. HP</div><div class"col-md-6">: {{$profile->nomor_hp}}</div></div>
                            <div class="row"><div class="col-md-6">Email</div><div class"col-md-6">: {{$profile->email}}</div></div>

							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
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
