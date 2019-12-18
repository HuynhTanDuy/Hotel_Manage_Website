<?php

namespace App\Repositories\CategoryFood;
use Illuminate\Support\ServiceProvider;

class CategoryFoodServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->app->bind('App\Repositories\CategoryFood\CategoryFoodInterface', 'App\Repositories\CategoryFood\CategoryFoodRepository');
    }
}