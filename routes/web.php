<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(base_path('routes/api.php'));

Route::get('/{any}', function () {
    return view('app');
})->where('any', '^(?!api).*$');
