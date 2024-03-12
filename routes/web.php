<?php

use App\Http\Controllers\AddDevice;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function() {
    return view('welcome');
});

Route::get('/add', function() {
    return view('add');
});

Route::get('/calendar', function() {
    $phones = DB::select('select * from phone_specs');
    return view('calendar', array('phones'=>$phones));
});

Route::post('/adding',[AddDevice::class, 'adding'])->name('adding');

Route::get('/home', function () {
    $phones = DB::select('select * from phone_specs');
    return view('home', array('phones'=>$phones));
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
