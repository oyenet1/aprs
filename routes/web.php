<?php

use App\Http\Controllers\ShowProfile;
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

Route::get('/students', App\Http\Livewire\Users::class)->name('students');
Route::get('/payments', App\Http\Livewire\Payments::class)->name('payments');
Route::get('/reversals', App\Http\Livewire\Reversals::class)->name('reversal');
Route::get('/fees', App\Http\Livewire\Fees::class)->name('fees');
Route::get('/profile/{id}', ShowProfile::class)->name('profile');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
