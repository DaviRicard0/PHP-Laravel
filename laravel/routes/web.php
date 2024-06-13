<?php

use App\Http\Controllers\MedicoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/medico');
});

Route::resource('medico',MedicoController::class);
