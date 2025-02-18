<?php

use App\Http\Controllers\IncidentesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IncidentesController::class, 'index'])->name('index');
Route::post('/incidentes/import', [IncidentesController::class, 'import'])->name('incidentes.import');
Route::post('/incidentes/new', [IncidentesController::class, 'newIncident'])->name('incidentes.new');

Route::get('/incidentes/{incidente}/edit', [IncidentesController::class, 'edit'])->name('incidentes.edit');
Route::put('/incidentes/{incidente}', [IncidentesController::class, 'update'])->name('incidentes.update');
Route::delete('/incidentes/{incidente}', [IncidentesController::class, 'destroy'])->name('incidentes.destroy');
