<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('pemohon/getdatapemohon','ApiController@getdatapemohon')->name('pemohon.getdatapemohon');
Route::post('pemohon/getdata/jenis-sbu','ApiController@getdatajenissbu')->name('pemohon.getdatajenis.sbu');
Route::post('pemohon/getdata/jenis-skt','ApiController@getdatajenisskt')->name('pemohon.getdatajenis.skt');
Route::post('pemohon/getdata/jenis-ska','ApiController@getdatajenisska')->name('pemohon.getdatajenis.ska');