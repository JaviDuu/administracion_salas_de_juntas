<?php

use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});
//Route::get('drop/{id}', 'RoomController@drop');Route::get('/rooms/{id}/drop', 'App\Http\Controllers\RoomController@drop')->name('rooms.drop');

Route::get('/rooms/{id}/drop', 'App\Http\Controllers\RoomController@drop')->name('rooms.drop');

Route::get('/rooms/{id}/make-available', [RoomController::class, 'makeRoomAvailable'])->name('rooms.make-available');


Route::resource('rooms', RoomController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


