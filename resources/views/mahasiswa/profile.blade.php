@extends('template.mahasiswa')
@include('mahasiswa.sidebar')

@section('title','| Mahasiswa - Profile')

@section('stylesheet')
<link rel="stylesheet" href="{{asset('assets/admin-lte/plugins/fontawesome-free/css/all.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{'https://akademik.polban.ac.id/fotomhsrekap/'.$profile->nim.'.jpg'}}"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{$profile->nama}}</h3>

                            <p class="text-muted text-center">{{$profile->nama}}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>NIM</b> <a class="float-right">{{$profile->nim}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Gender</b> <a class="float-right">{{$profile->gender}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>TTL</b> <a class="float-right">{{$profile->tempat_lahir}}, {{$profile->tanggal_lahir}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Telepon</b> <a class="float-right"
                                        href="tel:{{$profile->nomor_hp}}">{{$profile->nomor_hp}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right"
                                        href="mailto:{{$profile->email}}">{{$profile->email}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Alamat</b> <a class="float-right">{{$profile->alamat}}, {{$profile->kota}}</a>
                                </li>
                            </ul>
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
