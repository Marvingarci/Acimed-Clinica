<?php


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

use App\Http\Controllers\Api\V1\DoctorController as DoctorV1;
use App\Http\Controllers\Api\V1\PacienteController as PacienteV1;
use App\Http\Controllers\Api\V1\LoginController;
use App\Http\Controllers\Api\V1\CitaController as CitaV1;
use Illuminate\Support\Facades\Route;

Route::post('v1/login', [
    LoginController::class,
    'login'
]);



Route::apiResource('v1/doctores', DoctorV1::class)
    ->only(['index', 'show', 'destroy', 'store']); // ->only('show'), dice que solamente de todo el controlador solo trabaje con el metodo show
// ->middleware('auth:sanctum');//antes de usar el autenticador de sanctum, tenemos que instalarlo composer require laravel/sanctum

Route::apiResource('v1/pacientes', PacienteV1::class);
// ->middleware('auth:sactum');

Route::apiResource('v1/citas', CitaV1::class);
    // ->middleware('auth:sactum');