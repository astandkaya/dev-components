<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use Illuminate\Routing\Router;

// @var Router $router

$router->middleware(['guest:admin'])->group(function () use ($router) {
    $router->get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    $router->post('/login', [AuthenticatedSessionController::class, 'store']);
});

$router->middleware(['auth:admin'])->group(function () use ($router) {
    $router->view('/', 'admin.dashboard')->name('dashboard');
    $router->view('/development', 'admin.development')->name('development');

    $router->post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
