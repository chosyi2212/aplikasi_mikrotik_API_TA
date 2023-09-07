<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('date', function ($expression) {
            $format = 'd/m/Y';
            if (strpos($expression, ',') !== false) {
                $args = explode(',', $expression, 2);
                $expression = trim($args[0]);
                $format = trim($args[1]);
            }
            return "<?php echo ($expression)->format('$format'); ?>";
        });
    }
}
