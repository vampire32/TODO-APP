<?php



use App\Livewire\Home;
use App\Livewire\Signin;
use App\Livewire\Signup;
use Illuminate\Support\Facades\Route;

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

Route::get('/', \App\Livewire\Dashboard::class);
Route::get('/signup',Signup::class)->name('registration');
Route::get('/signin',Signin::class)->name('login');
