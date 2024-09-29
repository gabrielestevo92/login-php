<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

// Rota para login - retorna dados do usuario e token de autenticação
Route::post('/login', [LoginController::class, 'login'])->name('login');

//Rotas de acesso restrito ao usuario logado
Route::group(['middleware' => ['auth:sanctum']], function(){

    // Rota para validaçao de usuario à acesso restrito
    Route::get('/user', [UserController::class, 'index']);

    // Rota para logout - A requisição deverá ser do tipo POST enviando o id do cliente
    Route::post('/logout/{user}', [LoginController::class, 'logout']); 
});