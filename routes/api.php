<?php

use App\Http\Controllers\EtudiantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//créon notre route api
Route::get("etudiant", [EtudiantController::class, 'listEtudiants']);
Route::get("etudiant/{id}", [EtudiantController::class, 'getEtudiant']);
Route::post("creer-etudiant", [EtudiantController::class, 'create']);
Route::put("update/{id}", [EtudiantController::class, 'update']);
Route::delete("delete/{id}", [EtudiantController::class, 'delete']);
