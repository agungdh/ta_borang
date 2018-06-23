<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbca262e1e93c4f2ca194525e8ba41a01
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twig\\' => 5,
        ),
        'G' => 
        array (
            'Gumlet\\' => 7,
        ),
        'F' => 
        array (
            'Faker\\' => 6,
        ),
        'A' => 
        array (
            'Apfelbox\\FileDownload\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
        'Gumlet\\' => 
        array (
            0 => __DIR__ . '/..' . '/gumlet/php-image-resize/lib',
        ),
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fzaninotto/faker/src/Faker',
        ),
        'Apfelbox\\FileDownload\\' => 
        array (
            0 => __DIR__ . '/..' . '/apfelbox/php-file-download/src',
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
        'S' => 
        array (
            'Skyzyx\\Components\\Mimetypes' => 
            array (
                0 => __DIR__ . '/..' . '/skyzyx/mimetypes/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbca262e1e93c4f2ca194525e8ba41a01::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbca262e1e93c4f2ca194525e8ba41a01::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitbca262e1e93c4f2ca194525e8ba41a01::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
