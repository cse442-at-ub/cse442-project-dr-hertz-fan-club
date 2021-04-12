<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DisplayUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DisplayPostController;

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

//Route::get('/cards', function () {
//    return view('cards');
//
//})->name('cards');

Route::get('/details', function () {
    return view('details');

})->name('details');

Route::get('/faq', function () {
    return view('faq');

})->name('faq');

//------------ Post page

Route::get('/post', [PostController::class, 'index'])->middleware('auth')->name('post');
Route::post('/post', [PostController::class, 'store'])->middleware('auth');

//----------- Contact us page

Route::get('/contactus', [ContactController::class, 'index'])->name('contactus');

Route::post('/contactus', [ContactController::class, 'store']);


Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');

//------------ Forgot Password stuff

Route::get('/forgotpassword', [VerifyEmailController::class, 'index'])->name('verify');

Route::post('/forgotpassword', [VerifyEmailController::class, 'store']);

//------------- Verify email stuff

Route::get('/verify', [VerifyEmailController::class, 'index'])->name('verify');

Route::post('/verify', [VerifyEmailController::class, 'store']);


//------------- For display function--------
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/dashboard', [DisplayUserController::class, 'index'])->name('names');


Route::get('/cards', [DisplayPostController::class, 'index'])->name('posts');


//----------password reset function----------
Route::get('/reset/password', [PasswordResetController::class,'create'])->middleware('auth')->name('reset.password');

Route::post('/reset/password', [PasswordResetController::class,'store'])->middleware('auth');

//-----------profile page------------------
Route::get('/profile', [ProfileController::class,'index'])->middleware('auth')->name('profile');


require __DIR__.'/auth.php';

