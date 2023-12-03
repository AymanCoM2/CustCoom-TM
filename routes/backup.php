<?php

use App\Http\Controllers\BackUpController;
use Illuminate\Support\Facades\Route;


Route::get('/backup-excel', [BackUpController::class, 'getBackupView'])->name('backup-excel');
Route::post('/backup-excel', [BackUpController::class, 'exportAllDataHandler'])->name('backup-post');
