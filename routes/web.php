<?php
Route::get('/tamu', 'TamuController@index');

Route::get('/', 'SaksiController@lihatSemua');
Route::get('/kab/{id}', 'SaksiController@lihatKabKota');
Route::get('/kec/{id}', 'SaksiController@lihatKec');
Route::get('/kel/{id}', 'SaksiController@lihatKelDesa');


Route::any ( '/search', 'SaksiController@search');
Route::any ( '/kab/{id}/search', 'SaksiController@searchKab');
Route::any ( '/kec/{id}/search', 'SaksiController@searchKec');
Route::any ( '/kel/{id}/search', 'SaksiController@searchKel');

Route::any ('/cetak/provinsi', 'ConvertPdfController@cetakAll');
Route::any ('/cetak/kab/{id}', 'ConvertPdfController@cetakKab');
Route::any ('/cetak/kec/{id}', 'ConvertPdfController@cetakKec');
Route::any ('/cetak/kel/{id}', 'ConvertPdfController@cetakKel');

Route::get('/saksi/create/kel/{idDesaKoor}', 'SaksiController@formDesaKoorCreate');
Route::get('/saksi/{id}/edit/kel/{idDesaKoor}', 'SaksiController@formDesaKoorUpdate');


Route::prefix('lihatkoor')->group(function() {
  Route::get('/','KoorController@lihatSemua');
  Route::get('/kab/{id}', 'KoorController@lihatKabKota');
  Route::get('/kec/{id}', 'KoorController@lihatKec');
  Route::get('/kel/{id}', 'KoorController@lihatKelDesa');

  Route::any ( '/search', 'KoorController@search');
  Route::any ( '/kab/{id}/search', 'KoorController@searchKab');
  Route::any ( '/kec/{id}/search', 'KoorController@searchKec');
  Route::any ( '/kel/{id}/search', 'KoorController@searchKel');

  Route::any ('/cetak/provinsi', 'ConvertPdfController@cetakAll');
  Route::any ('/cetak/kab/{id}', 'ConvertPdfController@cetakKab');
  Route::any ('/cetak/kec/{id}', 'ConvertPdfController@cetakKec');
  Route::any ('/cetak/kel/{id}', 'ConvertPdfController@cetakKel');
});


// Route::prefix('admin')->group(function() {
//   Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
//   Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
//   Route::get('/kab/{id}', 'AdminController@lihatKabKota');
//   Route::get('/kab/{idKab}/kec/{id}', 'AdminController@lihatKec');
//   Route::get('/kab/{idKab}/kec/{idKec}/kel/{id}', 'AdminController@lihatKelDesa');
//   Route::get('/', 'AdminController@index')->name('admin.dashboard');

//   Route::any ( '/search', 'AdminController@search');
//   Route::any ( '/kab/{id}/search', 'AdminController@searchKab');
//   Route::any ( '/kab/{idKab}/kec/{id}/search', 'AdminController@searchKec');
//   Route::any ( '/kab/{idKab}/kec/{idKec}/kel/{id}/search', 'AdminController@searchKel');

//   Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//   Route::post('/register', 'Auth\RegisterController@register');
//   Route::post('/logout', 'Auth\AdminLoginController@logout')->name('adminLogout');
// });



Route::prefix('tamu')->group(function(){ 
  Route::get('/login', 'Auth\TamuLoginController@showLoginForm')->name('tamu.login');
  Route::post('/login', 'Auth\TamuLoginController@login')->name('tamu.login.submit');
  Route::post('/logout', 'TamuLoginController@logout')->name('tamu.logout');

  Route::get('/', 'TamuController@lihatSemuaSaksi');
  Route::get('/home', 'TamuController@persentase')->name('tamu.dashboard');
  Route::get('/kab/{id}', 'TamuController@lihatKabKotaSaksi');
  Route::get('/kec/{id}', 'TamuController@lihatKecSaksi');
  Route::get('/kel/{id}', 'TamuController@lihatKelDesaSaksi');

  Route::any ( '/search', 'TamuController@searchSaksi');
  Route::any ( '/kab/{id}/search', 'TamuController@searchKabSaksi');
  Route::any ( '/kec/{id}/search', 'TamuController@searchKecSaksi');
  Route::any ( '/kel/{id}/search', 'TamuController@searchKelSaksi');

  Route::any ('/cetak/provinsi', 'TamuController@cetakAll');
  Route::any ('/cetak/kab/{id}', 'TamuController@cetakKab');
  Route::any ('/cetak/kec/{id}', 'TamuController@cetakKec');
  Route::any ('/cetak/kel/{id}', 'TamuController@cetakKel');

  Route::get('/profilkoor/{id}','TamuController@profilKoor');
  Route::get('/generate-pdf', 'ConvertPdfController@pdfview')->name('generate-pdf');
});


Route::prefix('tamu/lihatkoor')->group(function() {
  Route::get('','TamuController@lihatSemuaKoor');
  Route::get('/kab/{id}', 'TamuController@lihatKabKotaKoor');
  Route::get('/kec/{id}', 'TamuController@lihatKecKoor');
  Route::get('/kel/{id}', 'TamuController@lihatKelDesaKoor');

  Route::any ( '/search', 'TamuController@searchKoor');
  Route::any ( '/kab/{id}/search', 'TamuController@searchKabKoor');
  Route::any ( '/kec/{id}/search', 'TamuController@searchKecKoor');
  Route::any ( '/kel/{id}/search', 'TamuController@searchKelKoor');

  Route::any ('/cetak/provinsi', 'TamuController@cetakAll');
  Route::any ('/cetak/kab/{id}', 'TamuController@cetakKab');
  Route::any ('/cetak/kec/{id}', 'TamuController@cetakKec');
  Route::any ('/cetak/kel/{id}', 'TamuController@cetakKel');

  Route::get('/profilkoor/{id}','TamuController@profilKoor');
});



// Auth::routes();
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginFormKec')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


// Registration Routes...


// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::resource('/saksi', 'SaksiController');
Route::resource('/koor', 'KoorController');

Route::post('/koor/{id}', 'KoorController@update');
Route::post('/saksi/{id}', 'SaksiController@update');

Route::prefix('saksisaya')->group(function() {
  Route::get('/', 'HomeController@saksiSaya');
  Route::get('/kel/{id}', 'HomeController@saksiSayaKel');
  Route::any('/search', 'HomeController@cariSaksiSaya');
  Route::any('/kel/{id}/search', 'HomeController@cariSaksiSayaKel');

  Route::any ('/cetak', 'ConvertPdfController@cetakKecSaya');
  Route::any ('/cetak/kel/{id}', 'ConvertPdfController@cetakKelSaya');
});


Route::prefix('koorsaya')->group(function() {
  Route::get('/', 'HomeController@koorSaya');
  Route::get('/kel/{id}', 'HomeController@koorSayaKel');
  Route::any('/search', 'HomeController@cariKoorSaya');
  Route::any('/kel/{id}/search', 'HomeController@cariKoorSayaKel');

  Route::any ('/cetak', 'ConvertPdfController@cetakKecSaya');
  Route::any ('/cetak/kel/{id}', 'ConvertPdfController@cetakKelSaya');
});



Route::get('/profilkoor/{id}','HomeController@profilKoor');
Route::get('/home','HomeController@persentase');
