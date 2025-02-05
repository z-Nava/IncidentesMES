<?php

use App\Http\Controllers\IncidentesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IncidentesController::class, 'index'])->name('index');
Route::post('/incidentes/import', [IncidentesController::class, 'import'])->name('incidentes.import');
