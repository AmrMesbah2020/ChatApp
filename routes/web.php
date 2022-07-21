<?php

use App\Http\Controllers\ChannelController;
use App\Http\Controllers\MessageeController;
use App\Models\Channel;
use App\Models\Message;
use App\Models\User;
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

require __DIR__.'/auth.php';

Route::get('/channels',[ChannelController::class,'index'])->middleware(['auth']);
Route::get('/channels/{channel}',[ChannelController::class,'show'])->middleware(['auth']);

Route::get('/messages',[MessageeController::class , 'message'])->middleware(['auth']);
