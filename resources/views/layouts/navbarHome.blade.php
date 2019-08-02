<div class="container-fluid">
  <nav class="navbar navbar-expand-lg fixed-top">
    <span class="navbar-brand text-light"><span class="font-weight-bold">{{Auth::user()->name}}</span></span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="mdi mdi-menu text-light"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbar-mobile">
      <ul class="navbar-nav mr-auto">

      </ul>
      <div class="navbar-nav">
        <li class="nav-item nav-space">
          @if(Auth::user()->username !== 'tamu')
          <a class="btn btn-light font-weight-bold nav-link" href="/home"><i class="mdi mdi-home"></i> Home</a>
          @endif

          @if(Auth::user()->username == 'tamu')
          <a class="btn btn-light font-weight-bold nav-link" href="/tamu/home"><i class="mdi mdi-home"></i> Home</a>
          @endif
        </li>

        <li class="nav-item nav-space dropdown">
          <a class="btn btn-primary nav-link dropdown-toggle font-weight-bold" href="#" id="navDropdownLihatDaftar" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-table"></i> Lihat Semua Daftar
          </a>
          <div class="dropdown-menu" aria-labelledby="navDropdownLihatDaftar">
            @if(Auth::user()->username !== 'tamu')
            <a class="dropdown-item font-weight-bold" href="/">Daftar Saksi</a>
            <a class="dropdown-item font-weight-bold" href="/lihatkoor">Daftar Koordinator</a>
            @endif

            @if(Auth::user()->username == 'tamu')
            <a class="dropdown-item font-weight-bold" href="/tamu">Daftar Saksi</a>
            <a class="dropdown-item font-weight-bold" href="/tamu/lihatkoor">Daftar Koordinator</a>
            @endif

          </div>
        </li>

          @if(Auth::user()->username !== 'tamu')
        <li class="nav-item nav-space dropdown">
          <a class="btn btn-success nav-link dropdown-toggle font-weight-bold" href="#" id="navDropdownProfil" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-account-multiple"></i> Lihat Daftar Saya
          </a>
          <div class="dropdown-menu" aria-labelledby="navDropdownProfil">
            <a class="dropdown-item font-weight-bold" href="/saksisaya">Saksi Saya</a>
            <a class="dropdown-item font-weight-bold" href="/koorsaya">Koordinator Saya</a>
          </div>
        </li>

        <li class="nav-item nav-space dropdown">
          <a class="btn btn-tambahData nav-link dropdown-toggle font-weight-bold" href="#" id="navDropdownCreate" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-plus"></i> Tambah Data
          </a>
          <div class="dropdown-menu" aria-labelledby="navDropdownCreate">
            <a class="dropdown-item font-weight-bold" href="{{route('koor.create')}}">Koordinator</a>
            <a class="dropdown-item font-weight-bold" href="{{route('saksi.create')}}">Saksi</a>
          </div>
        </li>
          @endif

            {{--  @if(Auth::user()->username !== 'tamu')
            <li class="nav-item nav-space">
            <a class="btn btn-keluar nav-link font-weight-bold" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
              <i class="mdi mdi-power"></i> Keluar
            </a>

            <form id="logout-form" action="{{ route('tamu.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @else  --}}
            <li class="nav-item nav-space">
            <a class="btn btn-keluar nav-link font-weight-bold" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
              <i class="mdi mdi-power"></i> Keluar
            </a>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            {{--  @endif  --}}
        </li>
      </div>
    </div>
  </nav>
</div>
