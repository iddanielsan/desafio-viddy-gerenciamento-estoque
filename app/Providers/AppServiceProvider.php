<?php

namespace App\Providers;

use App\Contracts\ModelRepositoryContract;
use App\Models\Fornecedor;
use App\Repositories\FornecedorRepository;
use App\Services\FornecedorService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(FornecedorService::class)
        ->needs(ModelRepositoryContract::class)
        ->give(FornecedorRepository::class);

        $this->app->when(FornecedorRepository::class)
        ->needs(Model::class)
        ->give(Fornecedor::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
