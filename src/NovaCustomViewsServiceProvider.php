<?php

namespace Quantick\NovaCustomViews;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;
use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;

class NovaCustomViewsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        Nova::serving(function (ServingNova $event) {
            Nova::script('nova-custom-views', __DIR__ . '/../dist/js/nova-custom-views.js');
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([Command\ViewsCommand::class, Command\DashboardViewCommand::class, Command\Error403ViewCommand::class, Command\Error404ViewCommand::class]);
    }
}
