<?php

use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Usercontroller;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home.index');


Route::middleware(['auth'])->group(function(){
    Route::get('/account-deshboard', [Usercontroller::class, 'index'])->name('frontend.index');


    Route::get('/Dashbord', [Usercontroller::class, 'dashboard'])->name('frontend.dashboard');
});

Route::middleware(['auth', AuthAdmin::class])->group(function(){
    Route::get('/admin', [Admincontroller::class, 'index'])->name('backend.index');
    Route::get('/Deshbord', [Admincontroller::class, 'deshboard'])->name('backend.deshboard');
    
    
    Route::get('/brands', [Admincontroller::class, 'brands'])->name('backend.brands');
    Route::get('/addbrands', [Admincontroller::class, 'addbrands'])->name('backend.addbrands');


    








});




























