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
<link rel="stylesheet" href="{{asset('assets/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
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
                    <h1>Riwayat Konseling Kamu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Konseling</li>
                        <li class="breadcrumb-item active">Riwayat</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Riwayat Konseling</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="riwayat" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Konselor</th>
                                        <th>Waktu</th>
                                        <th>Tempat</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(($list_konseling) as $konseling)
                                    <tr>
                                        <td>{{$konseling->konselor->nama}}</td>
                                        <td>{{$konseling->waktu_mulai}}</td>
                                        <td>{{$konseling->tempat}}</td>
                                        <td>
                                            @if ($konseling->status == 'created')
                                            <span class="badge badge-secondary">Menunggu konfirmasi</span>
                                            @elseif ($konseling->status == 'approved')
                                            <span class="badge badge-info">Sudah dikonfirmasi</span>
                                            @elseif ($konseling->status == 'rescheduled-by-counselor')
                                            <span class="badge badge-warning">Ada perubahan jadwal dari Konselor</span>
                                            @elseif ($konseling->status == 'rescheduled-by-student')
                                            <span class="badge badge-warning">Kamu melakukan perubahan jadwal</span>
                                            @elseif ($konseling->status == 'canceled')
                                            <span class="badge badge-danger">Pertemuan dibatalkan</span>
                                            @elseif ($konseling->status == 'succeed')
                                            <span class="badge badge-success">Pertemuan telah selesai</span>
                                            @endif
                                        </td>
                                        <td>{{$konseling->keterangan}}</td>
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
</section>
@endsection

@section('javascript')
<script src="{{asset('assets/admin-lte/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
    $(function () {
        $('#riwayat').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });

</script>
<!-- Page specific script -->
@endsection
