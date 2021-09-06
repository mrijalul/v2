<?php
Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('pendaftaran/data/kependudukan','FrontController@pendaftaran_pemohon_user')->name('pendaftaran.pemohon');
// is_pemohon
Route::prefix('pemohon')->name('pemohon.')->middleware('is_pemohon')->group(function() {
	// dashboard pemohon
	Route::get('home','HomeController@pemohonHome')->name('home');
	// edit pemohon jika belum punya detail
	Route::post('dashboard/post','HomeController@pemohondashboardpost')->name('home.dashboard.pemohon.post');
	// edit pemohon jika sudah punya detail
	Route::patch('dashboard/{id}/update/{user_id}','HomeController@pemohondashboardupdate')->name('home.dashboard.pemohon.update');
	// halaman perizinan
	Route::get('izin/{slug}','PemohonPerijinanController@izin')->name('perijinan');
	// post perizinan
	Route::post('izin/{slug}/post','PemohonPerijinanController@izinpost')->name('perijinan.post');
	// data ajax kecamatan
	Route::get('ajax_kecamatanid','PemohonPerijinanController@ajaxkecamatanid');
	//update status perijinan
	Route::patch('izin/{slug}/update_status/{id}','PemohonPerijinanController@update_status')->name('perijinan.update_status');
	// detail perizinan
	Route::get('izin/{slug}/detail/{id}','PemohonPerijinanController@detail')->name('perijinan.detail');
	// upload data
	Route::patch('izin/{slug}/update/{id}/upload_perizinan','PemohonPerijinanController@upload_perizinan')->name('perijinan.upload_perizinan');
	Route::delete('izin/{slug}/delete/{id}','PemohonPerijinanController@deleteperijinan')->name('perijinan.deleteperijinan');
	// crud data pemohon only index dan store
	Route::resource('pemohon','PemohonController')->only(['index','store']);
});

// bag_pemeriksaan
Route::get('bagian-pemeriksa/home','HomeController@bagPemeriksaHome')->name('bagPemeriksa.home')->middleware('is_bagpemeriksa');

// is_front_office
Route::prefix('front-office')->name('frontOffice.')->middleware('is_frontoffice')->group(function() {
	// homepage frontoffice
	Route::get('home','HomeController@frontOfficeHome')->name('home');
	// edit pemohon jika belum punya detail
	Route::post('dashboard/post','HomeController@fodashboardpost')->name('home.dashboard.fo.post');
	// edit pemohon jika sudah punya detail
	Route::patch('dashboard/{id}/update/{user_id}','HomeController@fodashboardupdate')->name('home.dashboard.fo.update');
	// crud data pemohon only index dan store
	Route::get('pemohon','PemohonController@foindex')->name('pemohon.foindex');
	Route::post('pemohon/post','PemohonController@fostore')->name('pemohon.fostore');
	// halaman perizinan
	Route::get('izin/{slug}','FoPerijinanController@izin')->name('perijinan');
	// post perizinan
	Route::post('izin/{slug}/post','FoPerijinanController@izinpost')->name('perijinan.post');
	// data ajax kecamatan
	Route::get('ajax_kecamatanid','FoPerijinanController@ajaxkecamatanid');
	//update status perijinan
	Route::patch('izin/{slug}/update_status/{id}','FoPerijinanController@update_status')->name('perijinan.update_status');
	// detail perizinan
	Route::get('izin/{slug}/detail/{id}','FoPerijinanController@detail')->name('perijinan.detail');
	// upload data
	Route::patch('izin/{slug}/update/{id}/upload_perizinan','FoPerijinanController@upload_perizinan')->name('perijinan.upload_perizinan');
	Route::delete('izin/{slug}/delete/{id}','FoPerijinanController@deleteperijinan')->name('perijinan.deleteperijinan');
});