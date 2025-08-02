<?php

namespace PDVMobi\Laravel;

use Illuminate\Support\ServiceProvider;
use PDVMobi\PDVMobi;

class PDVMobiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(PDVMobi::class, function () {
            return new PDVMobi();
        });
    }

    public function provides()
    {
        return [PDVMobi::class];
    }
}
