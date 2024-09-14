<?php

use App\Http\Controllers\RawMaterialsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/visualization', function () {
        return view('visualization');
    })->name('visualization');

    Route::get('/visualization/inventory', [RawMaterialsController::class, 'index'])->name('visualization/inventory');
    Route::get('/visualization/inventory/create', [RawMaterialsController::class, 'create'])->name('visualization/inventory/create');
    Route::post('/visualization/inventory', [RawMaterialsController::class, 'store'])->name('visualization/inventory/store');
    Route::get('/visualization/inventory/view', [RawMaterialsController::class, 'view'])->name('visualization/inventory/view');
    Route::get('/visualization/inventory/{rawmaterial}/update', [RawMaterialsController::class, 'update'])->name('visualization/inventory/update');
    Route::put('/visualization/inventory/{rawmaterial}/save', [RawMaterialsController::class, 'save'])->name('visualization/inventory/save');
    Route::delete('/visualization/inventory/{rawmaterial}/delete', [RawMaterialsController::class, 'delete'])->name('visualization/inventory/delete');
});

