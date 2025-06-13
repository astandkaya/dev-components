<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::shouldBeStrict(! $this->app->isProduction());

        // view()の対象にviews/pagesディレクトリを追加
        View::getFinder()->prependLocation(resource_path('views/pages'));

        // PaginatorのBootstrapスタイルを使用
        Paginator::useBootstrap();
    }
}
