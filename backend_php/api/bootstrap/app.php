<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\AuthenticationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Adicione seus middlewares aqui, se necessário
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Exceção de erro de autenticação
        $exceptions->render(function(AuthenticationException $e) {
            // Retornar mensagem de erro e status 401
            return response()->json([
                'status' => false,
                'message' => 'Invalid authentication token',
            ], 401); 
        });
    })
    ->create();
