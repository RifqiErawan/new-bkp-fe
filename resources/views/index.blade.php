<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BKP - POLBAN @yield('title')</title>
    <link rel="icon" href="{{asset('favicon.png')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin-lte/dist/css/adminlte.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-dark navbar-dark">
            <div class="container">
                <a href="index3.html" class="navbar-brand">
                    <img src="{{ asset('assets/img/logo-polban.svg') }}" alt="AdminLTE Logo" class="brand-image mx-2" style="opacity: .9">
                    <span class="brand-text">BKP Politenik Negeri Bandung</span>
                    <!--  font-weight-light -->
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('profile')}}" class="nav-link">Profil</a>
                        </li>
                        <?php if(isset(\Session::get('credential')->user_data->roles[0]->name)){ ?>
                            <li class="nav-item dropdown">
                                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                                  <?php
                                      $name = \Session::get('credential')->user_data->profile->nama ;
                                      $firstName = explode(" ",$name);
                                      echo "Hai, " . $firstName[0];
                                   ?>
                                </a>
                                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                    <?php if(\Session::get('credential')->user_data->roles[0]->name == "admin"){ ?>
                                        <li><a href="{{route('admin.dashboard')}}" class="d-block dropdown-item">Dashboard</a></li>
                                    <?php } elseif(\Session::get('credential')->user_data->roles[0]->name == "konselor"){ ?>
                                        <li><a href="{{route('konselor.dashboard')}}" class="d-block dropdown-item">Dashboard</a></li>
                                    <?php } elseif(\Session::get('credential')->user_data->roles[0]->name == "mahasiswa"){ ?>
                                        <li><a href="{{route('mahasiswa.dashboard')}}" class="d-block dropdown-item">Dashboard</a></li>
                                    <?php } elseif(\Session::get('credential')->user_data->roles[0]->name == "pembantu_direktur"){ ?>
                                        <li><a href="{{route('pembantu_direktur.dashboard')}}" class="d-block dropdown-item">Dashboard</a></li>
                                    <?php } ?>
                                    <li class="dropdown-divider"></li>
                                    <li>
                                      <form action="{{route('auth.logout')}}" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                      </form>
                                    </li>
                                </ul>
                            </li>
                        <?php } else { ?>
                          <li class="nav-item">
                              <a href="{{route('auth.login_form')}}" class="nav-link">Dashboard</a>
                          </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Beranda</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item active"><a href="{{url('/')}}">Home</a></li> -->
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">

                    <div class="row">

                        <!-- Blog Entries Column -->
                        <div class="col-md-8">
                            <!-- Blog Post -->
                            <div class="card mb-4">
                                <img class="card-img-top" src="https://via.placeholder.com/728x180.png?text=Gambar+Posting+BKP" alt="Card image cap">
                                <div class="card-body">
                                    <h2 class="card-title"><b>Roadshow BKP bagi Mahasiswa Angkatan 2015</b></h2>
                                    <p class="card-text">By Muhammad Saiful Islam / 12 Maret 2016</p>
                                    <p class="card-text">Pada hari Rabu (2/3), UPT Bimbingan, Konseling, dan Pendampingan (BKP) Politeknik Negeri Bandung menyelenggarakan roadshow bagi mahasiswa JTK angkatan 2015. Kunjungan BKP ke JTK merupakan kunjungan pertama dari 14 kunjungan yang dijadwalkan bagi 14 jurusan yang ada di Polban.</p>
                                    <p class="card-text">Roadshow diselenggarakan di Ruang Serbaguna, lantai 2 gedung JTK Polban pada pukul 15.30 WIB, dengan materi dari Muhammad Arman, S.T., S.Psi., M.T. selaku Ketua UPT BKP Polban. Pada kesempatan ini, Arman membahas mengenai permasalahan yang biasa dialami oleh mahasiswa tingkat satu, seperti kesulitan mengatur waktu belajar, kurangnya motivasi dan semangat belajar, salah cara belajar, sulit menyesuaikan diri, toleransi tinggal di asrama/tempat indekos, dan frustasi serta konflik pribadi.</p>
                                    <p class="card-text">Ditanyai mengenai kegiatan tersebut, Novia Sukmasari, salah satu mahasiswa JTK mengaku mendapatkan pengetahuan baru serta sedikit-banyak termotivasi dari kegiatan tersebut. Terutama, karena permasalahan yang dibahas memang merupakan hal-hal yang sedang dialami oleh para mahasiswa tingkat 1, dan juga ada masalah-masalah yang tidak disadari sebelumnya.</p>
                                    <p class="card-text">Selain itu, Nita Amelia, mahasiswa JTK lainnya juga mengungkapkan bahwa setelah pengumuman hasil semester pertama di JTK, banyak yang merasa kecewa dengan perolehan akademik masing-masing. Karenanya, roadshow yang diselenggarakan UPT BKP ini cukup bagus. Selain itu, penyampaian Arman sebagai pemateri — yang juga merupakan lulusan S-1 Psikologi Universitas Padjadjaran tahun 1997 — dinilai baik karena dapat “menggali” para mahasiswa yang ragu untuk mengungkapkan pikirannya. (MS)</p>
                                    <p class="card-text">Foto utama: Muhammad Arman pada sesi tanya jawab setelah penyampaian materinya di Roadshow UPT BKP Polban. (Sumber: Departemen Komunikasi dan Informasi, Himpunan Mahasiswa Komputer)</p>
                                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                                </div>
                                <div class="card-footer text-muted">
                                    Posted on <?php echo Carbon\Carbon::now()->toDateTimeString(); ?> by
                                    <a href="#">Admin</a>
                                </div>
                            </div>

                            <!-- Pagination -->
                            <ul class="pagination justify-content-center mb-4">
                                <li class="page-item">
                                    <a class="page-link" href="#">Lama</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item disabled">
                                    <a class="page-link" href="#">Baru</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">

                            <!-- Search Widget -->
                            <div class="card my-4">
                                <h5 class="card-header">Cari</h5>
                                <div class="card-body">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Cari ...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-secondary" type="button">Cari</button>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Categories Widget -->
                            <div class="card my-4">
                                <h5 class="card-header">Label</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <ul class="list-unstyled mb-0">
                                                <li>
                                                    <a href="#">Psychology</a>
                                                </li>
                                                <li>
                                                    <a href="#">Relationship</a>
                                                </li>
                                                <li>
                                                    <a href="#">Motivation</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card my-4">
                                <h5 class="card-header">
                                    Social Page
                                </h5>
                                <div class="fb-page" data-href="https://www.facebook.com/" data-tabs="timeline" data-width="900" data-height="600" data-small-header="false" data-adapt-container-width="true"
                                  data-hide-cover="false" data-show-facepile="true">
                                    <blockquote cite="https://www.facebook.com/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/">Facebook</a></blockquote>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- /.row -->

                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <!-- <aside class="control-sidebar control-sidebar-dark"> -->
        <!-- Control sidebar content goes here -->
        <!-- <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside> -->
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                <small>&nbsp- Oleh TIM PKM-M (171511026,020,010)</small>
            </div>

            <div class="float-right d-none d-sm-inline">
                Bimbingan Konseling dan Pendampingan - Politeknik Negeri Bandung
            </div>

            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('assets/admin-lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/admin-lte/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
