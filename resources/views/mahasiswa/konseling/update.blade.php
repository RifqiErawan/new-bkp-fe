@extends('template.mahasiswa')
@include('mahasiswa.sidebar')
@section('title','| Mahasiswa - Konseling')
@section('content')

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Ubah Jadwal Pertemuan</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
						<li class="breadcrumb-item"><a href="{{}}">Konseling</a></li>
						<li class="breadcrumb-item active">Edite</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
