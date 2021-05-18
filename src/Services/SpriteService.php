<?php

namespace Ntpages\LaravelSprite\Services;

use Symfony\Component\HttpFoundation\Response;

class SpriteService
{
    public function getContents(string $name): ?string
    {
        $files = glob(join(DIRECTORY_SEPARATOR, [config('sprite.path'), $name, '*.svg']));

        if (!$files || empty($files)) {
            return null;
        }

        $xml = '<svg xmlns="http://www.w3.org/2000/svg">';

        foreach ($files as $filepath) {
            $xml .= strtr(file_get_contents($filepath), [
                '<svg ' => '<symbol id="' . pathinfo($filepath)['filename'] . '" ',
                '</svg>' => '</symbol>'
            ]);
        }

        return "$xml</svg>";
    }

    public function getResponse(string $name): Response
    {
        $contents = $this->getContents($name);

        abort_if(is_null($contents), Response::HTTP_NOT_FOUND);

        return response($contents)
            ->header('Content-Type', 'image/svg+xml')
            ->header('Accept-Ranges', 'bytes')
            ->header('Content-Length', strlen($contents));
    }
}
