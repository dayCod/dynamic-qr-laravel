<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('error')->group(function() {
    Route::get('/unauthorized', function() {
        return view('errors.401');
    });

    Route::get('/payment-required', function() {
        return view('errors.402');
    });

    Route::get('/forbidden', function() {
        return view('errors.403');
    });

    Route::get('/not-found', function() {
        return view('errors.404');
    });

    Route::get('/page-expired', function() {
        return view('errors.419');
    });
});

