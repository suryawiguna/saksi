<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class TamuLoginController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest:tamu');
  }

  public function showLoginForm()
  {
    return view('auth.tamu-login');
  }

  public function login(Request $request)
  {
    // Validate the form data
    $this->validate($request, [
      'username'   => 'required',
      'password'  => 'required|min:6'
    ]);
    // Attempt to log the user in
    if (Auth::guard('tamu')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
      // if successful, then redirect to their intended location
      return redirect()->route('tamu.dashboard');
    }
    // if unsuccessful, then redirect back to the login with the form data
    return redirect()->back()->withErrors(['Username/Password Salah!']);
  }

  public function logout(Request $request)
  {
      Auth::guard('tamu')->logout();
      $request->session()->flush();
      $request->session()->regenerate();
      return redirect()->guest(route( 'tamu.login' ));
  }
}
