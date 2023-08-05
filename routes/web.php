<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Medico\Registro\Show as MedicoRegistro;
use App\Http\Livewire\Paciente\Registro\Show as PacienteRegistro;
use App\Http\Controllers\RegistropacienteController as RegistropacienteController;
use App\Http\Controllers\MedicoController as MedicoController;
use App\Http\Livewire\Admin\Index as AdminIndex;
use App\Http\Controllers\ProfilePacienteController as ProfilePacienteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfilePacienteController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfilePacienteController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfilePacienteController::class, 'destroy'])->name('profile.destroy');
 
});

Route::middleware('auth')->group(function () {
    Route::get('/paciente', [RegistropacienteController::class, 'index'])->name('paciente.index');
    Route::patch('/paciente', [PacienteRegistro::class, 'update'])->name('paciente.update');
    Route::delete('/paciente', [PacienteRegistro::class, 'destroy'])->name('paciente.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/medico', [MedicoController::class, 'index'])->name('medico.index');
    Route::get('/medico/create', [MedicoController::class, 'create'])->name('medico.create');
    Route::post('/medico/create', [MedicoController::class, 'store']);
    Route::patch('/medico', [MedicoController::class, 'update'])->name('medico.update');
    Route::delete('/medico', [MedicoController::class, 'destroy'])->name('medico.destroy');
    Route::get('/medicovisual', [MedicoController::class, 'visual'])->name('medico.visual');
});

Route::middleware('IsMedico')->group(function () {
    Route::get('/medico', [MedicoController::class, 'areaMedico'])->name('areamedico.index');
    Route::get('/medico', [MedicoController::class, 'laudoView'])->name('medicoLaudo.index');
});

Route::middleware(['IsAdmin'])->group(function () {
    Route::get('/admin', [AdminIndex::class, 'render'])->name('admin.index');
});

require __DIR__.'/auth.php';







