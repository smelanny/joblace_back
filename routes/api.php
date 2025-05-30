<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\RepresentanteEmpresaController;
use App\Http\Controllers\CategoriaController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas públicas
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rutas protegidas
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // Rutas de empresas
    Route::get('/empresas', [EmpresaController::class, 'index']);
    Route::get('/empresas/{id}', [EmpresaController::class, 'show']);
    Route::post('/empresas', [EmpresaController::class, 'store']);
    Route::put('/empresas/{id}', [EmpresaController::class, 'update']);
    Route::delete('/empresas/{id}', [EmpresaController::class, 'destroy']);

    // Rutas de representantes
    Route::get('/representantes', [RepresentanteEmpresaController::class, 'index']);
    Route::get('/representantes/{userId}/{empresaId}', [RepresentanteEmpresaController::class, 'show']);
    Route::post('/representantes', [RepresentanteEmpresaController::class, 'store']);
    Route::put('/representantes/{userId}/{empresaId}', [RepresentanteEmpresaController::class, 'update']);
    Route::delete('/representantes/{userId}/{empresaId}', [RepresentanteEmpresaController::class, 'destroy']);
    Route::get('/empresas/{empresaId}/representantes', [RepresentanteEmpresaController::class, 'getByEmpresa']);
    Route::get('/usuarios/{userId}/representaciones', [RepresentanteEmpresaController::class, 'getByUsuario']);

    // Rutas de categorías
    Route::get('/categorias', [CategoriaController::class, 'index']);
});
