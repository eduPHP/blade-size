<?php

namespace S90\BladeSize\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\ComponentAttributeBag;
class BladeSizeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(realpath(__DIR__.'/../config/bladesize.php'), 'bladesize');

        ComponentAttributeBag::macro('size', function ($defaultSize) {
            $replacementMatch = config('bladesize.pattern');
            /** @var ComponentAttributeBag $this */
            if (! $this->has('class')) {
                return $this->merge(['class' => $defaultSize]);
            }

            if (! preg_match($replacementMatch, $this->get('class'))) {
                return $this->merge(['class' => $defaultSize]);
            }

            return $this;
        });
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/bladesize.php' => config_path('bladesize.php')
        ], 'blade-size-config');
    }
}