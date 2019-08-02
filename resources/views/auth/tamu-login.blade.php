<!DOCTYPE html>
<html lang="en">
  @include('layouts.base')
  <body>

    <div class="container py-4">
      <div class="row">
        <div class="col-md-12">
          <div class="text-center">
            <div class="row">
              <div class="col">
                <img src="/img/logoMantraKerta.jpg" class="img-fluid" width="200px">
                <img src="/img/saksikita.png" class="img-fluid py-3" width="150px"><br><br>  
              </div>
            </div>
            <h5 class="text-center font-weight-bold">Sistem Monitoring Saksi Pilgub Bali 2018</h5><br>
          </div>
          <div class="row">
            <div class="col-md-5 mx-auto">
              <div class="card rounded-0">
                <div class="card-header">

                  <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                      <a class="nav-link active" href="/tamu/login">Login Tamu</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/login">Login Kecamatan</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <h2 class="text-center">Login <strong>Tamu</strong></h2><br>

                  <form method="POST" action="{{ route('tamu.login.submit') }}">
                    @csrf

                    @if ($errors->any())
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{$errors->first()}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif

                    <div class="form-group">
                      <label for="username" class="font-weight-bold">Username</label>
                      <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                      @if ($errors->has('username'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('username') }}</strong>
                          </span>
                      @endif
                    </div>

                    <div class="form-group">
                      <label for="password" class="font-weight-bold">Password</label>
                      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                      @if ($errors->has('password'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                    </div>
                    <div class="form-group py-3">
                      <button type="submit" class="btn btn-primary btn-lg btn-block font-weight-bold">LOGIN</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center">
                  Copyright &copy; 2018<strong> Developed by Artibali Cyber Team</strong>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('layouts.script')
  </body>
</html>
