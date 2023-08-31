<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Medico\Registro\Show as MedicoRegistro;
use App\Http\Livewire\Paciente\Registro\Show as PacienteRegistro;
use App\Http\Controllers\RegistropacienteController as RegistropacienteController;
use App\Http\Controllers\MedicoController as MedicoController;
use App\Http\Controllers\AdminController as AdminController;
use App\Http\Controllers\PacienteController as PacienteController;
use App\Http\Controllers\EnderecoController as EnderecoController;
use App\Http\Controllers\PagesController as PagesController;

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


Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/benefit', [PagesController::class, 'benefit'])->name('benefit');
Route::get('/values', [PagesController::class, 'values'])->name('values');
Route::get('/contactUs', [PagesController::class, 'contactUs'])->name('contactUs');
Route::get('/aboutUs', [PagesController::class, 'aboutUs'])->name('aboutUs');
Route::get('/sobreNos', [PagesController::class, 'sobreNos'])->name('sobreNos');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //rota paciente em profile
    Route::post('/profilepaciente', [PacienteController::class, 'store'])->name('profilepaciente.store');
    Route::get('/profilepaciente', [PacienteController::class, 'edit'])->name('profilepaciente.edit');
    Route::patch('/profilepaciente', [PacienteController::class, 'update'])->name('profilepaciente.update');
    Route::delete('/profilepaciente', [PacienteController::class, 'destroy'])->name('profilepaciente.destroy');
    //rota medico em profile
    Route::post('/profilemedico', [MedicoRegistro::class, 'store'])->name('profilemedico.store');
    Route::get('/profilemedico', [MedicoRegistro::class, 'edit'])->name('profilemedico.edit');
    Route::patch('/profilemedico', [MedicoRegistro::class, 'update'])->name('profilemedico.update');
    Route::delete('/profilemedico', [MedicoRegistro::class, 'destroy'])->name('profilemedico.destroy');
    //Rota endereco em profile
    Route::post('/profileendereco', [EnderecoController::class, 'store'])->name('profileendereco.store');
    Route::get('/profileendereco', [EnderecoController::class, 'edit'])->name('profileendereco.edit');
    Route::patch('/profileendereco', [EnderecoController::class, 'update'])->name('profileendereco.update');
    Route::delete('/profileendereco', [EnderecoController::class, 'destroy'])->name('profileendereco.destroy');
    //Rota detalhes consulta
    Route::get('/detalhesconsulta', [ProfileController::class, 'detalhesConsulta'])->name('profile.detalhesConsulta');
    Route::get('/detalhessintomas', [ProfileController::class, 'detalhesSintomas'])->name('profile.detalhesSintomas');
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

Route::middleware('auth')->group(function () {
    Route::get('/areapaciente', [PacienteController::class, 'areapaciente'])->name('areapaciente.index');
    Route::get('/areapaciente/buscar', [PacienteController::class, 'buscarMedicos'])->name('areapaciente.buscar');
    Route::post('/areapaciente/store', [PacienteController::class, 'pacienteMedicoCreate'])->name('areapaciente.store');
    Route::get('/areapaciente/meusMedicos', [PacienteController::class, 'meusMedicos'])->name('areapaciente.meusMedicos');
    Route::post('/areapaciente/recomenda', [PacienteController::class, 'recomendaMedico'])->name('areapaciente.recomenda');
    Route::get('/areapaciente/meusMedicos/{id}', [PacienteController::class, 'detalhesMedico'])->name('areapaciente.medicoDetalhes');
});

Route::middleware(['IsMedico'])->group(function () {
    Route::get('/areamedico', [MedicoController::class, 'areamedico'])->name('areamedico.index');
    Route::get('/areamedico/consulta', [MedicoController::class, 'areamedicoconsulta'])->name('areamedico.consulta');
    Route::post('/areamedico/addpaciente', [MedicoController::class, 'addpaciente'])->name('areamedico.addpaciente');
    Route::get('/areamedico/criarForms', [MedicoController::class, 'criarForms'])->name('areamedico.criarForms');
    Route::get('/areamedico/meusPacientes', [MedicoController::class, 'meusPacientes'])->name('areamedico.meusPacientes');
    Route::get('/areamedico/meusPacientes/{id}', [MedicoController::class, 'paginaAddForms'])->name('areamedico.meusPacientescriarForm');
    Route::post('/areamendico/adicionarMedicamento', [MedicoController::class, 'passarParaPaciente'])->name('areamedico.passarParaPaciente');

    Route::post('/areamedico/meusPacientes/{id}', [MedicoController::class, 'addFormsStore'])->name('areamedico.meusPacientescriarFormStore');

    Route::get('/areamedico/consulta/create', [MedicoController::class, 'areamedicoconsultaCreate'])->name('areamedico.consulta.create');
    Route::post('/areamedico/consulta/create', [MedicoController::class, 'areamedicoconsultaStore']);
    Route::get('/areamedico/consulta/{id}/edit', [MedicoController::class, 'areamedicoconsultaEdit'])->name('areamedico.consulta.edit');
    Route::patch('/areamedico/consulta/{id}/edit', [MedicoController::class, 'areamedicoconsultaUpdate']);
    Route::delete('/areamedico/consulta/{id}/edit', [MedicoController::class, 'areamedicoconsultaDestroy'])->name('areamedico.consulta.destroy');
    Route::get('/areamedico/consulta/{id}/show', [MedicoController::class, 'areamedicoconsultaShow'])->name('areamedico.consulta.show');

});

Route::middleware(['IsAdmin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('areaadmin.index');
    //
    Route::get('/adminmedico', [AdminController::class, 'crudMedico'])->name('adminmedico.index');
    Route::post('/adminmedico', [AdminController::class, 'crudMedicoAdd'])->name('adminmedico.store');

    Route::get('/adminpaciente', [AdminController::class, 'crudPaciente'])->name('crudPaciente.index');
    Route::get('/adminuser', [AdminController::class, 'crudUser'])->name('crudUser.index');
});

require __DIR__.'/auth.php';
