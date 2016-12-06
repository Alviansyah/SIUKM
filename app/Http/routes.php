<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () { return view('welcome');});
Route::get('/', 'cHome@dashboard');

// Login routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', ['middleware' => 'auth', 'uses' => 'Auth\AuthController@logout']);

// Registration routes...
Route::get('auth/register',['middleware' => 'auth', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register',['middleware' => 'auth', 'uses' => 'Auth\AuthController@postRegister']);

// Anggota routes...
Route::get('/anggota', 'cAnggota@show');
Route::get('/edit/anggota/{id}', 'cAnggota@edit');
Route::get('/form/anggota', 'cAnggota@form');
Route::get('/detail/anggota/{id}', 'cAnggota@detail');
Route::post('/add/anggota', 'cAnggota@add');
Route::post('/update/anggota/{id}', 'cAnggota@update');

// Pengurus routes...
Route::get('/pengurus/{tahun}', 'cPengurus@show');
Route::post('/update/pengurus/{id}', 'cPengurus@update');
Route::get('/form/pengurus/', 'cPengurus@form');
Route::post('/add/pengurus/{id}', 'cPengurus@add');
Route::get('/delete/pengurus/{id}', 'cPengurus@delete');

// AD/ART routes...
Route::get('/adart', 'cADART@show');
Route::get('/adart/form', 'cADART@form');
Route::get('/adart/edit/{id}', 'cADART@edit');
Route::post('/adart/add', 'cADART@add');
Route::post('/adart/update/{id}', 'cADART@update');
Route::get('/adart/download/{id}', 'cADART@download');

// Kegiatan routes...
Route::get('/dana/', 'cDana@show');
Route::get('/form/dana/', 'cDana@form');
Route::get('/edit/dana/{id}', 'cDana@edit');
Route::post('/add/dana/', 'cDana@add');
Route::post('/update/dana/{id}', 'cDana@update');
Route::get('/download/dana/{id}', 'cDana@download');

// SPJ Routes...
Route::get('/spj', 'cSPJ@show');
Route::get('/spj/form','cSPJ@form');
Route::post('/spj/add','cSPJ@add');
Route::get('/spj/edit/{id}','cSPJ@edit');
Route::post('/spj/update/{id}','cSPJ@update');
Route::get('/spj/download/{id}','cSPJ@download');

// LPJ Routes...
Route::get('/lpj','cLPJ@show');
Route::get('/lpj/form','cLPJ@form');
Route::post('/lpj/add','cLPJ@add');
Route::get('/lpj/edit/{id}','cLPJ@edit');
Route::post('/lpj/update/{id}','cLPJ@update');
Route::get('/lpj/download/{id}','cLPJ@download');

// Proposal Routes...
Route::get('/proposal','cProposal@show');
Route::get('/proposal/form','cProposal@form');
Route::get('/proposal/edit/{id}','cProposal@edit');
Route::post('/proposal/add','cProposal@add');
Route::post('/proposal/update/{id}','cProposal@update');
Route::get('/proposal/download/{id}','cProposal@download');
Route::get('/proposal/detail/{id}', 'cProposal@detail');

// Jadwal Kegiatan Routes...
Route::get('/jadwal', 'cJadwal@show');

// Surat Routes...
Route::get('/surat/{tipe}', 'cSurat@show');
Route::get('/form/surat/{tipe}', 'cSurat@form');
Route::post('/add/surat/{tipe}', 'cSurat@add');
Route::get('/edit/surat/{tipe}/{id}', 'cSurat@edit');
Route::post('/update/surat/{tipe}/{id}', 'cSurat@update');
Route::get('/download/surat/{id}', 'cSurat@download');
Route::get('/detail/surat/{tipe}/{id}', 'cSurat@detail');
Route::get('/validasi/bem/surat/Keluar/{id}', 'cSurat@validasiBEM');
Route::get('/batal/bem/surat/Keluar/{id}', 'cSurat@batalBEM');
Route::get('/validasi/pd3/surat/Keluar/{id}', 'cSurat@validasiPD3');
Route::get('/batal/pd3/surat/Keluar/{id}', 'cSurat@batalPD3');

// Validasi routes...
Route::get('/validasi/bem/dana/{id}', 'cDana@validasiBEM');
Route::get('/batal/bem/dana/{id}', 'cDana@batalBEM');
Route::get('/validasi/pd3/dana/{id}', 'cDana@validasiPD3');
Route::get('/batal/pd3/dana/{id}', 'cDana@batalPD3');


