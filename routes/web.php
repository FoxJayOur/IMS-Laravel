<?php

use App\Http\Controllers\RawMaterialsController;
use App\Http\Controllers\WIPController;
use App\Http\Controllers\SuppliesController;
use App\Http\Controllers\FinishedGoodsController;
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

    //Routes for RawMaterials
    Route::prefix('visualization/inventory/rawmaterials')->group(function () {
        Route::get('/', [RawMaterialsController::class, 'index'])->name('inventory');
        Route::get('/create', [RawMaterialsController::class, 'create'])->name('rawMaterialsCreate');
        Route::post('/', [RawMaterialsController::class, 'store'])->name('rawMaterialsStore');
        Route::get('/view', [RawMaterialsController::class, 'view'])->name('rawMaterialsView');
        Route::get('/{rawmaterial}/update', [RawMaterialsController::class, 'update'])->name('rawMaterialsUpdate');
        Route::put('/{rawmaterial}/save', [RawMaterialsController::class, 'save'])->name('rawMaterialsSave');
        Route::delete('/{rawmaterial}/delete', [RawMaterialsController::class, 'delete'])->name('rawMaterialsDelete');
    });
     //Routes for WIPs
    Route::prefix('visualization/inventory/wips')->group(function () {
        Route::get('/', [WIPController::class, 'index'])->name('inventory');
        Route::get('/create', [WIPController::class, 'create'])->name('wipsCreate');
        Route::post('/', [WIPController::class, 'store'])->name('wipsStore');
        Route::get('/view', [WIPController::class, 'view'])->name('wipsView');
        Route::get('/{wip}/update', [WIPController::class, 'update'])->name('wipsUpdate');
        Route::put('/{wip}/save', [WIPController::class, 'save'])->name('wipsSave');
        Route::delete('/{wip}/delete', [WIPController::class, 'delete'])->name('wipsDelete');
    });
    //Routes for Supplies
    Route::prefix('visualization/inventory/supplies')->group(function () {
        Route::get('/', [SuppliesController::class, 'index'])->name('inventory');
        Route::get('/create', [SuppliesController::class, 'create'])->name('suppliesCreate');
        Route::post('/', [SuppliesController::class, 'store'])->name('suppliesStore');
        Route::get('/view', [SuppliesController::class, 'view'])->name('suppliesView');
        Route::get('/{supplies}/update', [SuppliesController::class, 'update'])->name('suppliesUpdate');
        Route::put('/{supplies}/save', [SuppliesController::class, 'save'])->name('suppliesSave');
        Route::delete('/{supplies}/delete', [SuppliesController::class, 'delete'])->name('suppliesDelete');
    });
    //Routes for FinishedGoods
    Route::prefix('visualization/inventory/finishedgoods')->group(function () {
        Route::get('/', [FinishedGoodsController::class, 'index'])->name('inventory');
        Route::get('/create', [FinishedGoodsController::class, 'create'])->name('finishedGoodsCreate');
        Route::post('/', [FinishedGoodsController::class, 'store'])->name('finishedGoodsStore');
        Route::get('/view', [FinishedGoodsController::class, 'view'])->name('finishedGoodsView');
        Route::get('/{finishedgood}/update', [FinishedGoodsController::class, 'update'])->name('finishedGoodsUpdate');
        Route::put('/{finishedgood}/save', [FinishedGoodsController::class, 'save'])->name('finishedGoodsSave');
        Route::delete('/{finishedgood}/delete', [FinishedGoodsController::class, 'delete'])->name('finishedGoodsDelete');
    });
});

