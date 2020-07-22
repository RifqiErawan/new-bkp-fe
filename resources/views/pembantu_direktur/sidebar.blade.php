@section('sidebar')
<li class="nav-item">
    <a href="{{route('pembantu_direktur.dashboard')}}" class="nav-link {{ (request()->segment(1) == 'mahasiswa' && request()->segment(2) == '') ? 'active' : '' }}">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Dashboard
      </p>
    </a>
  </li>
  <li class="nav-header">LAPORAN</li>
  <li class="nav-item">
    <a href="{{route('pembantu_direktur.tahunan')}}" class="nav-link {{ (request()->segment(1) == 'pembantu_direktur' && request()->segment(2) == 'tahunan' && request()->segment(3) == '') ? 'active' : '' }}">
      <i class="nav-icon far fa-calendar-alt"></i>
      <p>
        Cetak Laporan
        <!-- <span class="badge badge-info right">2</span> -->
      </p>
    </a>
  </li>
<li class="nav-header">TERMS & CONDITION</li>
<li class="nav-item">
  <a href="https://www.termsandconditionsgenerator.com/live.php?token=em1S4ExI7afEldoxTBgKXP1vdB4QPGyd" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>TERMS & CONDITION</p>
  </a>
</li>
@endsection
