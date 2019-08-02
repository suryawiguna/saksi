<!DOCTYPE html>
<html lang="en">
  @include('layouts.base')
  <body>

    <div class="container py-4">
      <div class="row">
        <div class="col-md-12">
          <div class="text-center">
            <img src="../img/logoMantraKerta.jpg" class="img-fluid" width="250px"><br><br>
            <h2 class="text-center font-weight-bold">SaksiKita</h2>
            <h5 class="text-center font-weight-bold">Sistem Manajemen Saksi Pilgub Bali 2018</h5><br>
          </div>
          <div class="row">
            <div class="col-md-5 mx-auto">
              <div class="card rounded-0">
                <div class="card-header">
                  <h2 class="text-center">Admin Login</h2>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf

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
                      <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
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
  </body>
</html>
