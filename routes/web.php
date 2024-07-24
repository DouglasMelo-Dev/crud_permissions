<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\UserController;
use App\http\Controllers\HomeController;


// Rotas sem login:
Route::get('/', function () {return view('welcome');});
// Route::get('/vagas')
// Route::get('/notícias')
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Apenas a pessoa autenticada pode acessar:
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// vagas
// currículo
//


require __DIR__.'/auth.php';

/*

Passos do Candidato:

1 - Acessa o site (/)
2 - Digita o nome do cargo ou clica em "Ver vagas"
3 - Seleciona a vaga e clica em Enviar Currículo

Dois caminhos:

    4 - APP direciona para fazer o login
    5 - Login é feito e o usuário é redirecionado para a página de vagas ou melhor para a vaga.
    6 - Sistema verifica se já tem currículo cadastrado
        6.1 - Se sim, redireciona para a página de currículo
        6.2 - Se não, redireciona para a página de cadastro de currículo
    7 - Currículo é cadastrado e o usuário é redirecionado para perguntas da empresa
    8 - Perguntas são respondidas e o Candidato recebe mensagem de "Sucesso" e "Continuar candidatura para outras vagas?"
        8.1 - Se sim, redireciona para a página de vagas
        8.2 - Se não, redireciona para a página (/)




        Teste:

        Posso criar paginas:
        - Financeiro
        - Vaga (para ter botoes de criar, excluir, editar)


*/
