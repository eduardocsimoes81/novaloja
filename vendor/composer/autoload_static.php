<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite6cc7aeef832e8c485527203c2fdabdb
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PagSeguro\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PagSeguro\\' => 
        array (
            0 => __DIR__ . '/..' . '/pagseguro/pagseguro-php-sdk/source',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite6cc7aeef832e8c485527203c2fdabdb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite6cc7aeef832e8c485527203c2fdabdb::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
