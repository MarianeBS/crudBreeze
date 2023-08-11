<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/cliente', [ClienteController::class, 'create'])->middleware(['auth'])->name('cliente.cadastrar');
Route::post('/cliente', [ClienteController::class, 'store'])->middleware(['auth'])->name('cliente.create');;

Route::get('/cliente-list', [ClienteController::class, 'list'])->middleware(['auth'])->name('cliente.view-listar');

Route::get('/cliente/{cliente}', [ClienteController::class, 'edit'])->middleware(['auth'])->name('cliente.editar');
Route::patch('/cliente/{cliente}', [ClienteController::class, 'update'])->middleware(['auth'])->name('cliente.update');

Route::get('/cliente-delete/{cliente}', [ClienteController::class, 'destroy'])->middleware(['auth'])->name('cliente.deletar');