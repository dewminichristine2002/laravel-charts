<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;

Route::get('/', function () {
    return redirect('/monthly-target');
});


Route::get('/monthly-target', [ChartController::class, 'show']);

Route::get('/invoice-chart', [ChartController::class, 'invoices']);

Route::get('/top-selling-parts', [ChartController::class, 'topSellingParts']);