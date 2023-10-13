<?php
namespace Mybizna\Classes\Loader;

use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Factory;

class Blade
{

    public function __construct()
    {
        $viewPaths = [plugin_dir_path() . '/views']; // Replace with the actual path to your Blade templates
        $cachePath = plugin_dir_path() . '/storage/cache'; // Replace with the path where you want to store cached views

        $viewFactory = new Factory(
            new EngineResolver(),
            new FileViewFinder(new Filesystem(), $viewPaths),
            new CompilerEngine(new BladeCompiler(new Filesystem(), $cachePath))
        );
    }

}
