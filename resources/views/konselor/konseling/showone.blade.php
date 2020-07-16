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
            <h1>Informasi Konseling</h1>
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
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{'https://akademik.polban.ac.id/fotomhsrekap/'.$konseling->mahasiswa->nim.'.jpg'}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$konseling->mahasiswa->nama}}</h3>

                <p class="text-muted text-center">{{$konseling->program_studi->nama}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>NIM</b> <a class="float-right">{{$konseling->mahasiswa->nim}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Gender</b> <a class="float-right">{{$konseling->mahasiswa->gender}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>TTL</b> <a class="float-right">{{$konseling->mahasiswa->tempat_lahir}}, {{$konseling->mahasiswa->tanggal_lahir}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Telepon</b> <a class="float-right">{{$konseling->mahasiswa->nomor_hp}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{$konseling->mahasiswa->email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Alamat</b> <a class="float-right">{{$konseling->mahasiswa->alamat}}, {{$konseling->mahasiswa->kota}}</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <div class="col-md-8">
            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Informasi konseling saat ini</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Status</strong>

                <?php
                  $status = array(
                    'created' => 'Menunggu Konfirmasi',
                    'approved' => 'Telah Dikonfirmasi',
                    'rescheduled' => 'Sedang Dijadwalkan Ulang',
                    'succeed' => 'Selesai',
                    'canceled' => 'Dibatalkan',
                  );
                 ?>

                <p class="text-muted">
                  Saat ini status konseling ini adalah <b>{{$status[$konseling->status]}}</b>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Lokasi Konseling</strong>

                <p class="text-muted">{{$konseling->tempat}}</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Deskripsi Konseling Dari Mahasiswa</strong>

                <p class="text-muted">{{$konseling->deskripsi}}</p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Keterangan</strong>

                <p class="text-muted">{{$konseling->keterangan}}</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <div class="col-md-12">
            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Keterangan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{route('konselor.konseling.update')}}" method="post">
                  @csrf
                  <input type="hidden" name="konseling_id" value="{{$konseling->id}}">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" rows="3" placeholder="Masukkan keterangan" <?php if($konseling->status == 'succeed' || $konseling->status == 'canceled') echo "disabled"; ?>>
                            {{$konseling->keterangan}}
                        </textarea>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Laporan</label>
                        <textarea class="form-control" rows="5" placeholder="Masukkan keterangan" <?php if($konseling->status == 'created' || $konseling->status == 'rescheduled' || $konseling->status == 'succeed' || $konseling->status == 'canceled' ) echo "disabled"; ?>>
                            {{$konseling->laporan_teks}}
                        </textarea>
                      </div>
                    </div>
                    @if($konseling->status != 'canceled' || $konseling->status != 'succeed')
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Status</label>
                        <select class="form-control custom-select" name="status" <?php if($konseling->status == 'succeed' || $konseling->status == 'canceled') echo "disabled"?>>
                          @if($konseling->status == 'created')
                          <option value="approved">Konfirmasi</option>
                          <option value="rescheduled">Jadwakan Ulang</option>
                          <option value="canceled">Batalkan</option>
                          @elseif($konseling->status == 'approved')
                          <option value="succeed">Tandai Selesai</option>
                          @endif
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="button" <?php if($konseling->status == 'succeed' || $konseling->status == 'canceled') echo "disabled"?> >Simpan</button>
                      </div>
                    </div>
                    @endif
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
