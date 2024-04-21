<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PhoneShowController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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
Route::get('lang/{locale}', [LocalizationController::class, 'setLanguage'])->name('setLanguage');

Route::get('/', function(Request $request) {
    $controller = new StatisticsController();
    $controller->StoreStat($request);
    return view('welcome');
});

Route::get('/add', function() {
    return view('add');
});
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/edit/{phone}', [PhoneShowController::class, 'edit'])->name('edit');

Route::post('/update/{id}', [DeviceController::class, 'update'])->name('device.update');

Route::get('/calendar', function() {
    $phones = DB::select('select * from phone_specs');
    return view('calendar', array('phones'=>$phones));
});

Route::post('/adding',[DeviceController::class, 'adding'])->name('adding');

Route::get('/delete/{id}', [DeviceController::class, 'delete'])->name('delete');

Route::get('/link/{id}', [LinkController::class, 'click'])->name('link');

Route::get('/phones/{phone}', [PhoneShowController::class, 'show'])->name('show');

Route::get('/isadmin',[AdminController::class, 'isAdmin'])->name('isadmin');

Route::get('/admin', [AdminController::class, 'show'])->name('admin')->middleware('auth');

Route::get('/admin/users', [AdminController::class, 'showPanel'])->name('users')->middleware('auth');

Route::get('/visited', [AdminController::class, 'showList'])->name('visited');

Route::get('/home', function () {
    $phones = DB::select('select * from phone_specs');
    return view('home', compact('phones'));
})->middleware(['auth', 'verified'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
