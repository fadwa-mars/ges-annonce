<?php
use App\Http\Controllers\AnnonceController;
use Illuminate\Support\Facades\Route;

Route::get('annonces/dashboard', [AnnonceController::class, 'dashboard']);
Route::resource('annonce', AnnonceController::class);