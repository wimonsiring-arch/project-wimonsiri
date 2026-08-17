<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClaimController;

Route::get('/', [ClaimController::class, 'index'])->name('claim.index');
Route::post('/claim', [ClaimController::class, 'store'])->name('claim.store');
