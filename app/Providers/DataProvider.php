<?php declare(strict_types = 1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Manager\Domain\Boundary\Repositories\HailingRadiusRepo;

class DataProvider extends ServiceProvider
{
    public function register()
    {

        //Complain Management
        $this->app->bind(
            \Manager\Domain\Boundary\Repositories\FlowRepositoryInterface::class,
            \Manager\Data\Eloquent\Repositories\MySQL\FlowRepository::class
        );

    }

}
