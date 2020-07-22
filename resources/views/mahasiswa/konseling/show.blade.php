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
                    <h1>Jadwal Konseling - Umum</h1>
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
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body p-0">
                            <!-- THE CALENDAR -->
                            <div id="calendar"></div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
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
                                            <div class="external-event bg-secondary"><i class="fas fa-clock mr-3"></i>Belum Dikonfirmasi</div>
                                            <div class="external-event bg-primary"><i class="fas fa-check-double mr-3"></i>Telah Dikonfirmasi</div>
                                            <div class="external-event bg-warning"><i class="fas fa-calendar-alt mr-3"></i>Dijadwalkan Ulang</div>
                                            <div class="external-event bg-success"><i class="fas fa-clipboard-check mr-3"></i> Selesai</div>
                                            <div class="external-event bg-danger"><i class="fas fa-ban mr-3"></i>Dibatalkan</div>
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
                                        <p>Bimbingan dan konseling merupakan upaya proaktif dan sistematik dalam
                                            memfasilitasi individu mencapai tingkat perkembangan yang optimal,
                                            pengembangan perilaku yang efektif, pengembangan lingkungan, dan peningkatan
                                            fungsi atau manfaat individu dalam lingkungannya.</p>
                                        <a class="btn btn-primary" href="{{route('mahasiswa.konseling.create')}}">
                                            <i class="fas fa-calendar-alt mr-3"></i>Jadwalkan Pertemuan</a>
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
<!-- fullCalendar 2.2.5 -->
<script src="{{asset('assets/admin-lte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/admin-lte/plugins/fullcalendar/main.min.js')}}"></script>
<script src="{{asset('assets/admin-lte/plugins/fullcalendar-daygrid/main.min.js')}}"></script>
<script src="{{asset('assets/admin-lte/plugins/fullcalendar-timegrid/main.min.js')}}"></script>
<script src="{{asset('assets/admin-lte/plugins/fullcalendar-interaction/main.min.js')}}"></script>
<script src="{{asset('assets/admin-lte/plugins/fullcalendar-bootstrap/main.min.js')}}"></script>
<!-- Page specific script -->

<script>
    $(function () {

        var Calendar = FullCalendar.Calendar;
        var calendarEl = document.getElementById('calendar');
        var jadwal = @json($list_jadwal);
        var calendar = new Calendar(calendarEl, {
            plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid'],
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listGridMonth'
            },
            //Random default events
            events: jadwal,
            editable: false,
            droppable: false, // this allows things to be dropped onto the calendar !!!
            drop: function (info) {
                // is the "remove after drop" checkbox checked?
                if (checkbox.checked) {
                    // if so, remove the element from the "Draggable Events" list
                    info.draggedEl.parentNode.removeChild(info.draggedEl);
                }
            }
        });
        calendar.render();
    })

</script>
@endsection
