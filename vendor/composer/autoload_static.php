<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit845aad8da24d3505cc840ca4f3142b58
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit845aad8da24d3505cc840ca4f3142b58::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit845aad8da24d3505cc840ca4f3142b58::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
