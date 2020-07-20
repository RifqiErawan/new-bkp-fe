@extends('template.admin')
@include('admin.sidebar')
@section('title','| Admin - Dashboard')
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
            <!-- <div class="card-body">
              <div class="callout callout-info">
                <h5>Sekilas mengenai konseling</h5>

                <p>Konseling atau penyuluhan adalah proses pemberian bantuan yang dilakukan oleh seorang ahli (disebut konselor/pembimbing) kepada individu yang mengalami sesuatu masalah (disebut konseli) yang bermuara pada teratasinya masalah yang dihadapi klien. Istilah ini pertama kali digunakan oleh Frank Parsons pada tahun 1908 saat ia melakukan konseling karier. Selanjutnya juga diadopsi oleh Carl Rogers yang kemudian mengembangkan pendekatan terapi yang berpusat pada klien (client centered).</p>

                <p>Dibanding dengan psikoterapi, konseling lebih berurusan dengan klien (konseli) yang mengalami masalah yang tidak terlalu berat sebagaimana halnya yang mengalami psikopatologi, skizofrenia, maupun kelainan kepribadian.</p>

                <p>Umumnya konseling berasal dari pendekatan humanistik dan berpusat pada klien. Konselor juga berhubungan dengan permasalahan sosial, budaya, dan perkembangan selain permasalahan yang berkaitan dengan fisik, emosi, dan kelainan mental. Dalam hal ini, konseling melihat kliennya sebagai seseorang yang tidak mempunyai kelainan secara patologis. Konseling merupakan pertemuan antara konselor dengan kliennya yang memungkinkan terjadinya dialog dan bukannya pemberian terapi atau perawatan (treatment). Konseling juga mendorong terjadinya penyelesaian masalah oleh diri klien sendiri.</p>
              </div>
            </div> -->
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