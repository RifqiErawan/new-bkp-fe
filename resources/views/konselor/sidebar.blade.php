@section('sidebar')
<li class="nav-item">
  <a href="{{route('konselor.dashboard')}}" class="nav-link {{ (request()->segment(1) == 'konselor' && request()->segment(2) == '' && request()->segment(3) == '') ? 'active' : '' }}">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Dashboard
    </p>
  </a>
</li>
<li class="nav-header">KONSELING</li>
<li class="nav-item">
    <a href="{{route('konselor.konseling')}}" class="nav-link {{ (request()->segment(1) == 'konselor' && request()->segment(2) == 'konseling' && request()->segment(3) == '') ? 'active' : '' }}">
    <i class="nav-icon far fa-calendar-alt"></i>
    <p>
      Jadwal Konseling
      <!-- <span class="badge badge-info right">2</span> -->
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-book"></i>
    <p>
      Riwayat
    </p>
  </a>
</li>
<li class="nav-item">
    <a href="{{route('konselor.konseling.list')}}" class="nav-link {{ (request()->segment(1) == 'konselor' && request()->segment(2) == 'konseling' && request()->segment(3) == 'list') ? 'active' : '' }}">
    <i class="nav-icon far fa-plus-square"></i>
    <p>
      Konfirmasi Pertemuan
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
