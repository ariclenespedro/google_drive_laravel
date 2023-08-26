<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('/upload', function (Request $request) {
    dd($request->file("thing")->store("","google"));
})->name("upload");

Route::get('/google-drive/auth', 'GoogleDriveController@auth');
Route::get('/google-drive/callback', 'GoogleDriveController@callback');

