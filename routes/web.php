<?php

use Ntpages\LaravelSprite\Http\Controllers\SpriteController;
use Illuminate\Support\Facades\Route;


Route::group(config('sprite.route'), function () {
    Route::get('/{name}.svg', SpriteController::class)->name('svg');
});
