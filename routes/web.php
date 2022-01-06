<?php

use Illuminate\Support\Facades\Auth;
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
    if (Auth::check()) {
        return view('dashboard');
    } else {
        return view('welcome');
    }
});

Route::get('/students', App\Http\Livewire\Users::class)->name('students')->middleware('role:superadmin');
Route::get('/payments', App\Http\Livewire\Payments::class)->name('payments')->middleware('role:superadmin');
Route::get('/reversals', App\Http\Livewire\Reversals::class)->name('reversal')->middleware('role:bankadmin');
Route::get('/fees', App\Http\Livewire\Fees::class)->name('fees')->middleware('role:students');
Route::get('/profile/{id}', ShowProfile::class)->name('profile')->middleware('role:students');

Route::get('/dashboard', function () {
    if (auth()->user()->hasRole('superadmin')) {
        return view('dashboard');
    } elseif (auth()->user()->hasRole('bankadmin')) {
        return redirect('/reversals');
    } else {
        return redirect()->route('profile', auth()->user()->id);
    }
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
