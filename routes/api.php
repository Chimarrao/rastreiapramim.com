<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EncomendaController;

Route::get('/encomenda/{codigo}', [EncomendaController::class, 'buscarEncomenda']);