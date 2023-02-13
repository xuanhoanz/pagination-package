<?php
namespace Pine\PinePagination;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Tu9\Tu9Pagination\View\Components\Pinepagination;

class PinePaginationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'pine-pagination');
        Blade::component('pine-pagination', Pinepagination::class);
    }

    public function register()
    {
    }
}
