<?php

Route::middleware(['web', 'auth'])
    ->prefix('job-monitor')
    ->group(function () {
        Route::get('/', [JobMonitorController::class, 'index'])->name('job-monitor.index');
        Route::get('/{job}', [JobMonitorController::class, 'show'])->name('job-monitor.show');
    });
