<div class="container-fluid">
  <nav class="navbar navbar-expand-lg fixed-top">
    <span class="navbar-brand text-light">Selamat Datang, <span class="font-weight-bold">{{Auth::user()->name}}</span></span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="mdi mdi-menu text-light"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbar-mobile">
      <ul class="navbar-nav mr-auto">

      </ul>
      <div class="navbar-nav">
        <li class="nav-item nav-space">
          <a class="btn btn-primary font-weight-bold nav-link" href="/profilsaya"><i class="mdi mdi-table-large"></i> Daftar Koordinator</a>
        </li>
        <li class="nav-item nav-space">
          <a class="btn btn-tambahData font-weight-bold nav-link" href="{{route('koor.create')}}"><i class="mdi mdi-plus"></i> Tambah Data</a>
        </li>
        <li class="nav-item nav-space">
          <a class="btn btn-keluar nav-link font-weight-bold" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            <i class="mdi mdi-power"></i> Keluar
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </li>
      </div>
    </div>
  </nav>
</div>
