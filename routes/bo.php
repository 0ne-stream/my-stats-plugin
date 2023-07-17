<?php

use Acme\MyStats\Http\Controllers\DashboardController;

// web, auth, check.permission are default for BO access
Route::middleware('web')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::middleware('check.permission')->group(function () {
            Route::get('/my-stats/dashboards/index', [DashboardController::class, 'index'])->name('my_stats.dashboards.index');
            Route::get('/my-stats/dashboards/create', [DashboardController::class, 'create'])->name('my_stats.dashboards.create');
            Route::get('/my-stats/dashboards/{dashboard}/edit', [DashboardController::class, 'edit'])->name('my_stats.dashboards.edit');
            Route::delete('/my-stats/dashboards/{dashboard)', [DashboardController::class, 'destroy'])->name('my_stats.dashboards.destroy');
        });
    });
});