<?php

use App\Http\Controllers\ProfileController;
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

Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::middleware('auth')->group(function () {
        Route::middleware('auth')->group(function () {
            Route::get('/', [App\Http\Controllers\AppController::class, 'home'])->name('home');
            Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
            Route::get('/vendas', [\App\Http\Controllers\SaleController::class, 'index'])->name('sale.index');
            Route::resource('/marcas', \App\Http\Controllers\BrandController::class)->names('brand');
            Route::resource('/servicos', \App\Http\Controllers\ServiceController::class)->names('service');
            Route::resource('/produtos', \App\Http\Controllers\ProductController::class)->names('product');
            Route::resource('/entrada-de-produtos', \App\Http\Controllers\ProductInputController::class)->names('productInput');
        });

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';
});
