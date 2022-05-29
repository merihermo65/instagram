<?php

use Illuminate\Support\Facades\Route;
use App\Models\Image;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/{filename}', [App\Http\Controllers\HomeController::class, 'getimagee'])->name('getimagee');
Route::get('/post.avatar/{filename}', [App\Http\Controllers\HomeController::class, 'getavatar'])->name('getavatar');




//Auth::user()->name getinfo
Route::get('/edit', [App\Http\Controllers\editar::class, 'index'])->name('edit');

Route::put('/edita', [App\Http\Controllers\editar::class, 'update'])->name('edita');

Route::get('/editpass', [App\Http\Controllers\editar::class, 'updatepass'])->name('editpass');



//imgnova

Route::get('/imgnova', [App\Http\Controllers\ImageController::class, 'penja'])->name('imgnova');

Route::put('/imgnovaa', [App\Http\Controllers\ImageController::class, 'penjaimg'])->name('imgnovaa');


Route::get('/image/{filename}', [App\Http\Controllers\editar::class, 'getimage'])->name('avatar');
