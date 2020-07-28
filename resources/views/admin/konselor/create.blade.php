@extends('template.admin')
@include('admin.sidebar')
@section('title','| Admin - Konselor')

@section('stylesheet')
<link rel="stylesheet" href="{{asset('assets/admin-lte/plugins/fontawesome-free/css/all.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- daterange picker -->
<link rel="stylesheet" href="{{asset('assets/admin-lte/plugins/daterangepicker/daterangepicker.css')}}">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{asset('assets/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="{{asset('assets/admin-lte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="{{asset('assets/admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('assets/admin-lte/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="{{asset('assets/admin-lte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
@endsection

@section('content')

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Tambahkan Konselor</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
						<li class="breadcrumb-item active">Tambahkan Konselor</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">

						<form class="" action="{{route('admin.konselor.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>NIP</label>
                                <input type="number" class="form-control" name="nip" placeholder="nip" required/>
                            </div>
                            <div class="form-group">
                                <label>Program Studi (Prodi)</label>
                                <select class="form-control" id="program_studi_id" name="program_studi_id">
                                    <option value="">-- Pilih Program Studi --</option>
                                    @foreach ($listProgramStudi as $prodi)
                                    <option value="{{$prodi->id}}">{{$prodi->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="nama" required/>
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" placeholder="tempat_lahir" required/>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" placeholder="tanggal_lahir" required/>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="L">Laki - Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nomor HP</label>
                                <input type="text" class="form-control" name="nomor_hp" placeholder="nomor_hp" required/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="email" required/>
                            </div>
							<div class="form-group">
								<button type="submit"class="btn btn-primary" name="button">Tambahkan Konselor</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@section('javascript')
<!-- jQuery -->
<!-- <script src="{{asset('assets/admin-lte/plugins/jquery/jquery.min.js')}}"></script>-->
<!-- Bootstrap 4 -->
<!-- <script src="{{asset('assets/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script> -->
<!-- Select2 -->
<script src="{{asset('assets/admin-lte/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('assets/admin-lte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('assets/admin-lte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/admin-lte/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('assets/admin-lte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('assets/admin-lte/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets/admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('assets/admin-lte/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<!-- AdminLTE App -->
<!-- <script src="{{asset('assets/admin-lte/dist/js/adminlte.min.js')}}"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{asset('assets/admin-lte/dist/js/demo.js')}}"></script> -->
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'MM/DD/YYYY hh:mm A'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
@endsection

