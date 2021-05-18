<?php

namespace Ntpages\LaravelSprite\Http\Controllers;

use Ntpages\LaravelSprite\Services\SpriteService;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Routing\Controller;

class SpriteController extends Controller
{
    public function __invoke(SpriteService $spriteService, string $name): Response
    {
        $cache = config('sprite.cache');

        # forever
        if ($cache['ttl'] === true) {
            return Cache::rememberForever(sprintf('%s.%s.svg', $cache['key'], $name),
                fn() => $spriteService->getResponse($name));
        }

        # specific
        if ($cache['ttl'] > 1) {
            return Cache::remember(sprintf('%s.%s.svg', $cache['key'], $name), $cache['ttl'],
                fn() => $spriteService->getResponse($name));
        }

        # no cache
        return $spriteService->getResponse($name);
    }
}
