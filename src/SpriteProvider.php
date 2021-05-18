<?php

namespace Ntpages\LaravelSprite;

use Illuminate\Support\ServiceProvider;

class SpriteProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(dirname(__DIR__) . '/config/sprite.php', 'sprite');
        $this->loadRoutesFrom(dirname(__DIR__) . '/routes/web.php');
    }
}
