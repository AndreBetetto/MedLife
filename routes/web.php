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
use Laravel\Socialite\Facades\Socialite as Socialite;
use App\Models\User as User;
use App\Http\Controllers\Auth\AuthenticatedSessionController as AuthenticatedSessionController;
use App\Models\Paciente;

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
Route::get('/doctors', [PagesController::class, 'doctors'])->name('doctors');
Route::get('/contactUs', [PagesController::class, 'contactUs'])->name('contactUs');
Route::get('/aboutUs', [PagesController::class, 'aboutUs'])->name('aboutUs');
Route::get('/sobreNos', [PagesController::class, 'sobreNos'])->name('sobreNos');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//teste
Route::get('/testeGPT', [PacienteController::class, 'testeGPT'])->name('testeGPT');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //rota paciente em profile
    Route::post('/profilepaciente', [PacienteController::class, 'store'])->name('profilepaciente.store');
    Route::get('/profilepaciente', [PacienteController::class, 'edit'])->name('profilepaciente.edit');
    Route::patch('/profilepaciente', [PacienteController::class, 'update'])->name('profilepaciente.update');
});

//Pacientes
Route::middleware('auth')->group(function () {
    Route::get('/areapaciente', [PacienteController::class, 'areapaciente'])->name('areapaciente.index');
    Route::get('/areapaciente/buscar', [PacienteController::class, 'buscarMedicos'])->name('areapaciente.buscar');
    Route::post('/areapaciente/store', [PacienteController::class, 'pacienteMedicoCreate'])->name('areapaciente.store');
    Route::get('/areapaciente/meusMedicos', [PacienteController::class, 'meusMedicos'])->name('areapaciente.meusMedicos');
    Route::post('/areapaciente/recomenda', [PacienteController::class, 'recomendaMedico'])->name('areapaciente.recomenda');
    Route::get('/areapaciente/meusMedicos/{id}', [PacienteController::class, 'detalhesMedico'])->name('areapaciente.medicoDetalhes');
    Route::get('/areapaciente/meusMedicos/{id}/forms', [PacienteController::class, 'detalhesMedicoForms'])->name('areapaciente.medicoDetalhesForms');
    Route::post('/areapaciente/meusMedicos/{id}/formsEnvia', [PacienteController::class, 'detalhesMedicoFormsStore'])->name('areapaciente.medicoDetalhesFormsStore');
    Route::get('/areapaciente/meusMedicos/{id}/suasRespostas/', [PacienteController::class, 'acessoFormulario'])->name('areapaciente.acessoForms');
});

//medicos
Route::middleware(['IsMedico'])->group(function () {
    Route::get('/areamedico', [MedicoController::class, 'areamedico'])->name('areamedico.index');
    Route::get('/areamedico/criarForms', [MedicoController::class, 'criarForms'])->name('areamedico.criarForms');
    Route::get('/areamedico/meusPacientes', [MedicoController::class, 'meusPacientes'])->name('areamedico.meusPacientes');
    Route::get('/areamedico/meusPacientes/{id}', [MedicoController::class, 'paginaAddForms'])->name('areamedico.meusPacientescriarForm');
    Route::post('/areamendico/adicionarMedicamento', [MedicoController::class, 'passarParaPaciente'])->name('areamedico.passarParaPaciente');
    Route::get('/areamedico/meusPacientes/{idPac}/detalhes', [MedicoController::class, 'pacienteProcessos'])->name('areamedico.acessoProcessos');
    Route::get('/areamedico/meusPacientes/{idPac}/detalhes/{idForm}', [MedicoController::class, 'pacienteProcessosForms'])->name('areamedico.acessoProcessosForms');
});

Route::middleware(['IsAdmin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('areaadmin.index');
    //
    Route::get('/adminmedico', [AdminController::class, 'crudMedico'])->name('crudMedico.index');
    Route::post('/adminmedico', [AdminController::class, 'crudMedicoAdd'])->name('crudMedico.store');

    Route::get('/adminpaciente', [AdminController::class, 'crudPaciente'])->name('crudPaciente.index');
    Route::post('/adminpaciente', [AdminController::class, 'crudPacienteAdd'])->name('crudPaciente.store');

    Route::get('/adminuser', [AdminController::class, 'crudUser'])->name('crudUser.index');
    Route::post('/adminuser', [AdminController::class, 'crudUserAdd'])->name('crudUser.store');
    Route::get('/adminuser/{id}', [AdminController::class, 'crudUserEdit'])->name('crudUser.edit');
    Route::put('/adminuser/{id}', [AdminController::class, 'crudUserUpdate'])->name('crudUser.update');
    

    Route::get('/addfuncionario', [AdminController::class, 'crudFuncionarioAdd'])->name('admin.add.addfuncionario');
});

/*
Route::middleware('auth')->group(function() {
    Route::get('/chat', 'HomeController@chat')->name('chat');
    Route::post('getFriends', 'HomeController@getFriends')->name('getFriends');
    Route::post('/session/create', 'SessionController@create')->name('session.create');
    Route::post('/session/{session}/chats', 'ChatController@chats')->name('session.chats');
    Route::post('/session/{session}/read', 'ChatController@read')->name('session.read');
    Route::post('/session/{session}/clear', 'ChatController@clear')->name('session.clear');
    Route::post('/session/{session}/block', 'BlockController@block')->name('session.block');
    Route::post('/session/{session}/unblock', 'BlockController@unblock')->name('session.unblock');
    Route::post('/send/{session}', 'ChatController@send')->name('send');
});
*/
Route::get('auth/google', [AuthenticatedSessionController::class, 'signInwithGoogle']);

Route::get('auth/google/callback', [AuthenticatedSessionController::class, 'callbackToGoogle']);


require __DIR__.'/auth.php';

Route::post('/language', function (Illuminate\Http\Request $request) {
    $language = $request->input('language');
    session(['language' => $language]);
    return redirect()->back();
})->name('language');
