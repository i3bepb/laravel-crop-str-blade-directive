<?php

namespace I3bepb\CropStrBladeDirective;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Support\Facades\Blade;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap service
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('crop', function ($expression) {
            return "<?php echo (new I3bepb\CropStrBladeDirective\CropStr())->apply($expression); ?>";
        });
    }
}
