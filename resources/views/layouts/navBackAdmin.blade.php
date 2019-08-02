<div class="container-fluid">
  <nav class="navbar navbar-expand-md fixed-top">
    <a href="/" class="btn text-center text-light nav-space" role="button" aria-pressed="true"><i class="mdi mdi-arrow-left"></i> Ke Beranda</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="mdi mdi-menu text-light"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbar-mobile">
      <ul class="navbar-nav mr-auto">

      </ul>
      <div class="navbar-nav">
        <li class="nav-item active nav-space">
          <a class="btn btn-tambahData font-weight-bold nav-link" href="{{route('koor.create')}}"><i class="mdi mdi-plus"></i> Tambah Data</a>
        </li>
        <li class="nav-item nav-space">
          <a class="btn btn-keluar nav-link font-weight-bold" href="{{ route('adminLogout') }}" onclick="event.preventDefault();
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
