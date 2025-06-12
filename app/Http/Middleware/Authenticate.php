<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {
            if (Route::is('api.*')) {
                abort(401, 'Unauthorized');
            }

            if (Route::is('admin.*')) {
                return route('admin.login');
            }

            return route('user.login');
        }

        return null;
    }
}
