<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6e014e1d9376c3f07fa688b771dfa0a1
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Module\\' => 7,
            'Mentor\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Module\\' => 
        array (
            0 => __DIR__ . '/../..' . '/../Module',
        ),
        'Mentor\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6e014e1d9376c3f07fa688b771dfa0a1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6e014e1d9376c3f07fa688b771dfa0a1::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}