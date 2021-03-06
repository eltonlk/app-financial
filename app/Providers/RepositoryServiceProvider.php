<?php

namespace AppFinancial\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\AppFinancial\Repositories\BankRepository::class, \AppFinancial\Repositories\BankRepositoryEloquent::class);
        $this->app->bind(\AppFinancial\Repositories\BankAccountRepository::class, \AppFinancial\Repositories\BankAccountRepositoryEloquent::class);
        $this->app->bind(\AppFinancial\Repositories\BillRepository::class, \AppFinancial\Repositories\BillRepositoryEloquent::class);
        $this->app->bind(\AppFinancial\Repositories\ClientRepository::class, \AppFinancial\Repositories\ClientRepositoryEloquent::class);
        $this->app->bind(\AppFinancial\Repositories\CategoryRepository::class, \AppFinancial\Repositories\CategoryRepositoryEloquent::class);
        //:end-bindings:
    }
}
