<?php

use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\EmployeController;
use App\Http\Controllers\API\V1\EquipeController;
use App\Http\Controllers\API\V1\EquipeEmployeController;
use App\Http\Controllers\API\V1\EtatController;
use App\Http\Controllers\API\V1\JourTravailController;
use App\Http\Controllers\API\V1\PointageController;
use App\Http\Controllers\API\V1\PosteController;
use App\Http\Controllers\API\V1\RoleController;
use App\Http\Controllers\API\V1\TypePointageController;
use App\Http\Controllers\API\V1\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);
Route::apiResource('user', UserController::class);
Route::apiResource('employe', EmployeController::class);
Route::apiResource('equipe', EquipeController::class);
Route::apiResource('equipe-employe', EquipeEmployeController::class);
Route::apiResource('etat', EtatController::class);
Route::apiResource('jour-travail', JourTravailController::class);
Route::apiResource('pointage', PointageController::class);
Route::apiResource('type-pointage', TypePointageController::class);
Route::apiResource('poste', PosteController::class);
Route::apiResource('role', RoleController::class);
