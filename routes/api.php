<?php

use App\Http\Controllers\EntrepriseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/entreprise-avec-utilisateur', [EntrepriseController::class, 'createEntrepriseWithUser']);