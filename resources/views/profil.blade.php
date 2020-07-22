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
    <style>
        * {
            box-sizing: border-box;
        }

        /* Float four columns side by side */
        .column {
            float: left;
            width: 25%;
            padding: 0 10px;
        }

        /* Remove extra left and right margins, due to padding */
        .row {
            margin: 0 -5px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive columns */
        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
                display: block;
                margin-bottom: 20px;
            }
        }

        /* Style the counter cards */
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            padding: 16px;
            text-align: center;
            background-color: #f1f1f1;
        }

    </style>
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-dark navbar-dark">
            <div class="container">
                <a href="index3.html" class="navbar-brand">
                    <img src="{{ asset('assets/img/logo-polban.svg') }}" alt="AdminLTE Logo" class="brand-image mx-2"
                        style="opacity: .9">
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
                                      echo "Hai, " . $firstName[0];
                                   ?>
                            </a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <?php if(\Session::get('credential')->user_data->roles[0]->name == "admin"){ ?>
                                <li><a href="{{route('admin.dashboard')}}" class="d-block dropdown-item">Dashboard</a>
                                </li>
                                <?php } elseif(\Session::get('credential')->user_data->roles[0]->name == "konselor"){ ?>
                                <li><a href="{{route('konselor.dashboard')}}"
                                        class="d-block dropdown-item">Dashboard</a></li>
                                <?php } elseif(\Session::get('credential')->user_data->roles[0]->name == "mahasiswa"){ ?>
                                <li><a href="{{route('mahasiswa.dashboard')}}"
                                        class="d-block dropdown-item">Dashboard</a></li>
                                <?php } elseif(\Session::get('credential')->user_data->roles[0]->name == "pembantu_direktur"){ ?>
                                <li><a href="{{route('pembantu_direktur.dashboard')}}"
                                        class="d-block dropdown-item">Dashboard</a></li>
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
                    <div class="row my-3">
                        <div class="col-sm-6">
                            <h1 class="ml-3 text-dark">Profil Tim Konselor</h1>
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
                    <div class="container page-container">
                        <div class="row">
                            @foreach(($list_konselor) as $konselor)
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="card">
                                    <div class="container">
                                        <p><b>{{$konselor->nama}}</b></p>
                                        <p class="title">{{$konselor->program_studi_id}}</p>
                                        @if(isset(\Session::get('credential')->user_data))
                                            <p>{{$konselor->email}}</p>
                                        @else
                                            <p class="text-secondary">Login untuk melihat kontak.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
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
