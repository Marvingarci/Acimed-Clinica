<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\DoctoresController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\RegistrarController;
use App\Http\Livewire\Citas\Calendario;
use App\Http\Livewire\Citas\Calendario2;
use App\Http\Livewire\Citas\DetalleCita;
use App\Http\Livewire\Citas\FormCitas;
use App\Http\Livewire\Doctores\Doctores;
use App\Http\Livewire\Doctores\EditDoctores;
use App\Http\Livewire\Doctores\FormDoctores;
use App\Http\Livewire\Home;
use App\Http\Livewire\Pacientes\Pacientes;
use App\Http\Livewire\Registrar;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get(
    'logout',
    function () {
        Auth::logout();
        return redirect(route('login'));
    }
);

Route::get('/registrar/paciente', function () {
    return view('registrar');
})->name('registrar');

Route::post('registrar/paciente', [RegistrarController::class, 'registrar_paciente'])
    ->name('registrar.paciente');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', Home::class)->name('home');

    // Doctores
    Route::get('/doctores', Doctores::class)->name('doctores');
    Route::get('/doctores/nuevo', FormDoctores::class)->name('crear-doctores');
    Route::get('/doctores/editar/{id}', EditDoctores::class);
    Route::get('/citas/calendario/', Calendario::class)->name('calendario');
    Route::get('/citas/calendario/{month}', Calendario2::class);
    Route::get('/citas', FormCitas::class)->name('citas');
    Route::get('/detalleCita/{id}', DetalleCita::class)->name('detalleCita');

    // Pacientes
    Route::get('/pacientes', Pacientes::class)->name('pacientes.index');

    Route::post('/doctores/guardar', [DoctoresController::class, 'store'])
        ->name('guardar_doctores');

    Route::post('/doctores/update/{doc}', [DoctoresController::class, 'update']);

    Route::get('/Evento/creado', [EventoController::class, 'index'])
        ->name('Evento.index');

    //ver calendario
    Route::get('/Evento/creado/{mes}', [EventoController::class, 'index_month']);

    //ver mes del calendario
    Route::get('/Evento/creado/{month}', [EventoController::class, 'index_month']);

    // ver formulario
    Route::get('/Evento/form', [EventoController::class, 'form'])
        ->name('evento.crear');

    //crear el evento
    Route::get('/Evento/crear', [EventoController::class, 'create'])
        ->name('evento.crear');
    Route::post('/Evento/crear', [EventoController::class, 'store'])
        ->name('evento.guardar');

    // detalles del evento
    Route::get('/Evento/details/{id}', [EventoController::class, 'details'])
        ->name('Evento.details');

    //boton para atra
    Route::get('/Evento/guardado', [EventoController::class, 'index'])
        ->name('evento.guardado');
});
