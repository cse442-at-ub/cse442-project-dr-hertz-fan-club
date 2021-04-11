<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

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
    return view('landing');
});

Route::get('/landing', function () {
    return view('landing');
})->name('landing');

Route::get('/signup', [RegisteredUserController::class, 'create'])->name('signup');

Route::post('/signup', [RegisteredUserController::class, 'store']);

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/main', function () {
    return view('main');
})->name('main');


Route::get('/post', function () {
    return view('post');

})->name('post');

Route::get('/cards', function () {
    return view('cards');

})->name('cards');

Route::get('/details', function () {
    return view('details');

})->name('details');

Route::get('/faq', function () {
    return view('faq');

})->name('faq');


Route::get('/contactus', [ContactController::class, 'index'])->name('contactus');

Route::post('/contactus', [ContactController::class, 'store']);


Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');

------- Verify email stuff

Route::get('/verify', [VerifyEmailController::class, 'index'])->name('verify');

Route::post('/verify', [VerifyEmailController::class, 'store']);


//------------- For display function--------
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/dashboard', [PostController::class,'index'])->name('posts');


//----------password reset function----------
Route::get('/reset/password', [PasswordResetController::class,'create'])->middleware('auth')->name('reset.password');

Route::post('/reset/password', [PasswordResetController::class,'store'])->middleware('auth');




require __DIR__.'/auth.php';
