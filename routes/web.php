<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [RegisterController::class, 'index'])->name('show-data');

Route::get('/halaman-pendaftaran', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/edit/{id}', [RegisterController::class, 'edit'])->name('halaman-edit');
Route::put('/update/{id}', [RegisterController::class, 'update'])->name('update');

Route::delete('/hapus/{id}', [RegisterController::class, 'destroy'])->name('hapus');
