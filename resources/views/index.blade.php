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
                <a href="{{url('/')}}" class="navbar-brand">
                    <img src="{{ asset('assets/img/logo-polban.svg') }}" alt="Polban Logo" class="brand-image mx-2" style="opacity: .9">
                    <span class="brand-text">BKP Politenik Negeri Bandung</span>
                    <!--  font-weight-light -->
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
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
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" class="nav-link dropdown-toggle">
                                <?php
                                      $name = \Session::get('credential')->user_data->profile->nama ;
                                      $firstName = explode(" ",$name);
                                      echo "Halo,&nbsp" . $firstName[0];
                                   ?>
                            </a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <?php if(\Session::get('credential')->user_data->roles[0]->name == "admin"){ ?>
                                <li><a href="{{route('admin.dashboard')}}" class="d-block dropdown-item">Dashboard Admin</a></li>
                                <?php } elseif(\Session::get('credential')->user_data->roles[0]->name == "konselor"){ ?>
                                <li><a href="{{route('konselor.dashboard')}}" class="d-block dropdown-item">Dashboard Konseling</a></li>
                                <?php } elseif(\Session::get('credential')->user_data->roles[0]->name == "mahasiswa"){ ?>
                                <li><a href="{{route('mahasiswa.dashboard')}}" class="d-block dropdown-item">Dashboard Konseling</a></li>
                                <?php } elseif(\Session::get('credential')->user_data->roles[0]->name == "pd3"){ ?>
                                <li><a href="{{route('pembantu_direktur.dashboard')}}" class="d-block dropdown-item">Dashboard BKP</a></li>
                                <?php } ?>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <form action="{{route('auth.logout')}}" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">Keluar</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <?php } else { ?>
                        <li class="nav-item">
                            <a href="{{route('auth.login_form')}}" class="nav-link">Laman Konseling</a>
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
                    <div id="carouselExampleIndicators" class="carousel slide mb-3" data-ride="carousel"
                        style="max-height: 300px; overflow:hidden">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class=" d-block w-100" style="width: 100%; height: auto"
                                    src="https://placehold.it/1200x300/39CCCC/ffffff&text=Info+BKP+(A)"
                                    alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" style="width: 100%; height: auto"
                                    src="https://placehold.it/1200x300/3c8dbc/ffffff&text=Info+BKP+(B)"
                                    alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" style="width: 100%; height: auto"
                                    src="https://placehold.it/1200x300/f39c12/ffffff&text=Info+BKP+(C)"
                                    alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
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
                            @isset($posts)
                            @foreach ($posts as $post)

                            <!-- Blog Post -->
                            <div class="card mb-4">
                                @isset($post->image_url)
                                <img class="card-img-top"
                                    src="https://via.placeholder.com/728x180.png?text=Gambar+Posting+BKP"
                                    alt="Card image cap">
                                @endisset
                                <div class="card-body">
                                    <h2 class="card-title"><b>{{$post->title}}</b></h2>
                                    <p class="card-text">{{$post->body}}</p>
                                </div>
                                <div class="card-footer text-muted">
                                    @if($post->created_at == $post->updated_at)
                                    Dibuat
                                    @else
                                    Diperbaharui
                                    @endif
                                    pada {{$post->updated_at}} oleh <a href="">Admin</a>
                                </div>
                            </div>
                            @endforeach
                            @endisset
                            @empty($records)
                                <h3 class="text-center text-secondary my-5">Belum ada posting</h3>
                            @endempty
                            @empty(!$posts)
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
                            @endempty
                        </div>
                        <div class="col-md-4">

                            <!-- Search Widget -->
                            <div class="card mb-4">
                                <h5 class="card-header">Cari</h5>
                                <div class="card-body">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Cari ..." disabled>
                                        <span class="input-group-btn">
                                            <button class="btn btn-secondary" type="button" disabled>Cari</button>
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
                                                    <a href="">Psychology</a>
                                                </li>
                                                <li>
                                                    <a href="">Relationship</a>
                                                </li>
                                                <li>
                                                    <a href="">Motivation</a>
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
                                <div class="fb-page" data-href="https://www.facebook.com/" data-tabs="timeline"
                                    data-width="900" data-height="600" data-small-header="false"
                                    data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                    <blockquote cite="https://www.facebook.com/" class="fb-xfbml-parse-ignore"><a
                                            href="https://www.facebook.com/">Facebook</a></blockquote>
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
            <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
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
