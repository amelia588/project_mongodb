<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Connection;

class MongoDbServiceProvider extends ServiceProvider
{
    public function register()
    {
        // No es necesario hacer nada especial en register para este caso
    }

        public function boot()
    {
        $this->app->resolving('db', function ($db) {
            $db->extend('mongodb', function ($config, $name) {
                $config['name'] = $name;
                return new Connection($config);
            });
        });
    }

}
