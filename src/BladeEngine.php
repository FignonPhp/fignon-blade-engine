<?php

declare(strict_types=1);

namespace Fignon\Extra;

use Fignon\Extra\ViewEngine;

/**
 * This is just a bridge between Fignon Framework and Laravel's Blade Engine
 *
 * For more customization, @see https://laravel.com/docs/5.8/blade and https://github.com/jenssegers/blade
 *
 * Note: As Blade is built in Laravel template engine, using it outside Laravel
 * is not trivial. You need to install some dependencies and configure it.
 *
 * For this engine, you need to install:
 *
 * composer require jenssegers/blade
 *
 * When using this engine,  use as template name 'example' for 'example.blade.php'.
 * (Omit the extension which is '.blade.php')
 */
class BladeEngine implements ViewEngine
{
    protected $loader;

    public function init(string $templatePath = null, string $templateCachedPath = null, array $options = []): BladeEngine
    {
        if (null === $templateCachedPath || null === $templatePath) {
            throw new \Fignon\Error\TunnelError('Template path or cached path is not set');
        }

        $this->loader = new \Jenssegers\Blade\Blade($templatePath, $templateCachedPath);

        return $this;
    }

    public function render(string $viewPath = '', $locals = [], array $options = []): string
    {

        if (null === $this->loader) {
            throw new \Fignon\Error\TunnelError('Template path or cached path is not set');
        }

        if (!\is_array($locals)) {
            throw new \Fignon\Error\TunnelError('Locals must be an array');
        }

        if ('' === $viewPath) {
            throw new \Fignon\Error\TunnelError('View path is empty');
        }

        return $this->loader->make($viewPath, $locals)->render();
    }
}
