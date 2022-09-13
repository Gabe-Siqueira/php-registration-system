<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit96d971ef372bc5e0caa8d85e8b155323
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit96d971ef372bc5e0caa8d85e8b155323::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit96d971ef372bc5e0caa8d85e8b155323::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit96d971ef372bc5e0caa8d85e8b155323::$classMap;

        }, null, ClassLoader::class);
    }
}
