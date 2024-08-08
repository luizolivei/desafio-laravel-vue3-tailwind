<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurriculoController;

Route::post("/backend-response", function () {
    return 'Every thing okay!';
});

Route::get('/mysql-response', function () {
    try {
        \DB::connection()->getPdo();
        return 'Sucess!';
    } catch (\Exception $e) {
        return 'Damn anything is going wrong here:.. ' . $e->getMessage();
    }
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::middleware('role:2')->group(function () {
        Route::get("/is-adm", function () {
            error_log("É um adm.");
            return 'Yes is adm!';
        });
    });
    Route::get("/is-auth", function () {
        error_log("Esta autenticado.");
        return 'Yes!';
    });
    Route::get('/curriculos', [CurriculoController::class, 'index']);
    Route::post('/curriculos', [CurriculoController::class, 'store']);
    Route::delete('/curriculos/{id}', [CurriculoController::class, 'destroy']);
});
