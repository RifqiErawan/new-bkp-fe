@section('sidebar')
<li class="nav-item">
  <a href="{{route('mahasiswa.dashboard')}}" class="nav-link {{ (request()->segment(1) == 'mahasiswa' && request()->segment(2) == '') ? 'active' : '' }}">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Dashboard
    </p>
  </a>
</li>
<li class="nav-header">KONSELING</li>
<li class="nav-item">
  <a href="{{route('mahasiswa.konseling')}}" class="nav-link {{ (request()->segment(1) == 'mahasiswa' && request()->segment(2) == 'konseling' && request()->segment(3) == '') ? 'active' : '' }}">
    <i class="nav-icon far fa-calendar-alt"></i>
    <p>
      Jadwal Konseling
      <!-- <span class="badge badge-info right">2</span> -->
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="{{route('mahasiswa.konseling.history')}}" class="nav-link {{ (request()->segment(2) == 'konseling' && request()->segment(3) == 'history') ? 'active' : '' }}">
    <i class="nav-icon fas fa-book"></i>
    <p>
      Riwayat Konseling
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="{{route('mahasiswa.konseling.create')}}" class="nav-link {{ (request()->segment(2) == 'konseling' && request()->segment(3) == 'create') ? 'active' : '' }}">
    <i class="nav-icon far fa-plus-square"></i>
    <p>
      Jadwalkan Pertemuan
    </p>
  </a>
</li>
<li class="nav-header">OTHER</li>
<li class="nav-item">
  <a href="{{route('mahasiswa.feedback')}}" class="nav-link">
    <i class="nav-icon far fa-thumbs-up"></i>
    <p>
      Masukan & Saran
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="https://www.termsandconditionsgenerator.com/live.php?token=em1S4ExI7afEldoxTBgKXP1vdB4QPGyd" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>Terms & Condition</p>
  </a>
</li>
@endsection
