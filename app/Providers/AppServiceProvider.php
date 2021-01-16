<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

// use App\Category;
use App\Subcategory;
use App\Brand;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $categories=Category::all();
        $subcategories=Subcategory::all();
        $brands=Brand::all();
      
        // View::share('categories',$categories);
        View::share('subcategories',$subcategories);
        View::share('brands',$brands);
    }
}
