<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PatientsController;
use App\Http\Controllers\AuthController;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/Patients', [PatientsController::class, 'index']);
    Route::get('/Patients/{id}', [PatientsController::class, 'show']);
    Route::post('/Patients', [PatientsController::class, 'store']);
    Route::put('/Patients/{id}', [PatientsController::class, 'update']);
    Route::delete('/Patients/{id}', [PatientsController::class, 'destroy']);

    Route::get('/Patients/search/{name}', [PatientsController::class, 'search']);
    Route::get('/Patients/status/positive', [PatientsController::class, 'positive']);
    Route::get('/Patients/status/recovered', [PatientsController::class, 'recovered']);
    Route::get('/Patients/status/dead', [PatientsController::class, 'dead']);
});
