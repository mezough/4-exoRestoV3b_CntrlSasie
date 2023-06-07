<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit4dc0c5448f2e3dd99460e55b2a5d4a9a
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit4dc0c5448f2e3dd99460e55b2a5d4a9a', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit4dc0c5448f2e3dd99460e55b2a5d4a9a', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit4dc0c5448f2e3dd99460e55b2a5d4a9a::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
