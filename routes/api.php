<?php

use Illuminate\Support\Facades\Route;

Route::get("/backend-response", function () {
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
