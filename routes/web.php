<?php

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware'=>'auth'], function (){
    Route::get('/notifyUser', [\App\Http\Controllers\NotificationController::class, 'index'])->name('notify.user');
    Route::post('/sendMessage', [\App\Http\Controllers\NotificationController::class, 'sendMessage'])->name('send.message');
    Route::get('/delNote', [\App\Http\Controllers\NotificationController::class, 'delete'])->name('del.note');
});



require __DIR__.'/auth.php';
