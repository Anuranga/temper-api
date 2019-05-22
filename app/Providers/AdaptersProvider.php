<?php declare(strict_types = 1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AdaptersProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            \Manager\Domain\Boundary\Adapters\DateTimeAdapter::class,
            function($app)
            {
                $config = [
                    'time_zone' => env('APP_TIMEZONE')
                ];

                return new \Manager\Adapters\DateTime\Generic\GenericDateTimeAdapter($config);
            }
        );

        $this->app->bind(
            \Manager\Domain\Boundary\Adapters\TokenAdapter::class,
            function($app)
            {
                $config = [
                    'token_secret_key' => env('AUTH_TOKEN_SECRET'),
                    'app_name' => env('APP_NAME'),
                    'token_lifespan' => env('AUTH_TOKEN_LIFESPAN')
                ];

                return new \Manager\Adapters\Token\JWT\JWTAdapter($config,
                                                                 app(\Manager\Domain\Boundary\Adapters\DateTimeAdapter::class)
                );
            }
        );

        $this->app->bind(
            \Manager\Domain\Boundary\Adapters\HashAdapter::class,
            function($app)
            {
                $config = [
                    'cost' => env('HASH_COST', null)
                ];

                return new \Manager\Adapters\Hash\Bcrypt\BcryptAdapter($config);
            }
        );
    }

}