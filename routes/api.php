<?php

use App\Http\Controllers\Api\Select2Controller;
use Illuminate\Routing\Router;

// @var Router $router

$router->middleware(['auth:admin'])->prefix('/admin')->as('admin.')->group(function () use ($router) {
    $router->prefix('/select2')->as('select2.')->controller(Select2Controller::class)->group(function () use ($router) {
        $router->get('admins', 'admins')->name('admins');
    });
});
