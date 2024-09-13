<?php

use App\Http\Controllers\RawMaterialController;
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
    Route::get('/visualization/inventory', [RawMaterialController::class, 'index'])->name('visualization/inventory');
    Route::get('visualization/inventory/create', [RawMaterialController::class, 'create'])->name('visualization/inventory/create');
});

