<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit12ad3a0d8274fdd1d8c37ffbe7be0c3b
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'My\\Quiz\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'My\\Quiz\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Quiz',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit12ad3a0d8274fdd1d8c37ffbe7be0c3b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit12ad3a0d8274fdd1d8c37ffbe7be0c3b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
