<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf542a82cf6208a7cc9b9547fb6b8936c
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Views\\' => 6,
        ),
        'T' => 
        array (
            'Templates\\' => 10,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
        ),
        'M' => 
        array (
            'Models\\' => 7,
        ),
        'H' => 
        array (
            'Html\\' => 5,
        ),
        'C' => 
        array (
            'Controllers\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Views\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Views',
        ),
        'Templates\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Templates',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Models',
        ),
        'Html\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/public_html',
        ),
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Controllers',
        ),
    );

    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Twig_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/twig/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf542a82cf6208a7cc9b9547fb6b8936c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf542a82cf6208a7cc9b9547fb6b8936c::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitf542a82cf6208a7cc9b9547fb6b8936c::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
