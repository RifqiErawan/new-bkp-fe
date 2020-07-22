@extends('template.konselor')
@include('konselor.sidebar')
@section('title','| Konselor - Konseling')

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
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(($list_konseling) as $konseling)
                                    <tr>
                                        <td>{{$konseling->mahasiswa->nama}}</td>
                                        <td>{{$konseling->waktu_mulai}}</td>
                                        <td>{{$konseling->tempat}}</td>
                                        <td>{{$konseling->deskripsi}}</td>
                                        <td>
                                            @if($konseling->status == 'created')
                                            <span class="float-left badge bg-secondary">Menunggu Konfirmasi</span>
                                            @elseif($konseling->status == 'approved')
                                            <span class="float-left badge bg-primary">Telah Dikonfirmasi</span>
                                            @elseif($konseling->status == 'rescheduled-by-counselor')
                                            <span class="float-left badge bg-warning">Reschedule oleh Konselor</span>
                                            @elseif($konseling->status == 'rescheduled-by-student')
                                            <span class="float-left badge bg-warning">Reschedule oleh Mahasiswa</span>
                                            @elseif($konseling->status == 'canceled')
                                            <span class="float-left badge bg-danger">Dibatalkan</span>
                                            @elseif($konseling->status == 'succeed')
                                            <span class="float-left badge bg-success">Selesai</span>
                                            @endif
                                        </td>
                                        <td>{{$konseling->keterangan}}</td>
                                        <td>
                                            <form class="" action="{{route('konselor.konseling.show')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="konseling_id" value="{{$konseling->id}}">
                                                <button type="submit" class="btn btn-secondary" name="button">
                                                    <!-- <i class="fas fa-eye mr-2"></i> -->
                                                    <span>Lihat</span>
                                                </button>
                                            </form>

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
<!-- /.content-wrapper -->
@endsection

@section('javascript')
<!-- fullCalendar 2.2.5 -->
<script src="{{asset('assets/admin-lte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/admin-lte/plugins/fullcalendar/main.min.js')}}"></script>
<script src="{{asset('assets/admin-lte/plugins/fullcalendar-daygrid/main.min.js')}}"></script>
<script src="{{asset('assets/admin-lte/plugins/fullcalendar-timegrid/main.min.js')}}"></script>
<script src="{{asset('assets/admin-lte/plugins/fullcalendar-interaction/main.min.js')}}"></script>
<script src="{{asset('assets/admin-lte/plugins/fullcalendar-bootstrap/main.min.js')}}"></script>
<script src="{{asset('assets/admin-lte/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!-- Page specific script -->
<script>
    $(function () {
        $('#riwayat').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });

</script>
@endsection
