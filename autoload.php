<?php

define('AUTOLOADER_INITIALIZED', '1');

$classmap = [
    'Framework' => __DIR__ . '/src/Framework',
    'Framework\Rules' => __DIR__ . '/src/Framework/Rules',
    'Framework\Exceptions' => __DIR__ . '/src/Framework/Exceptions',
    'Framework\Contracts' => __DIR__ . '/src/Framework/Contracts',
    'App\Controllers' => __DIR__ . '/src/App/Controllers',
    'App\Config' => __DIR__ . '/src/App/Config',
    'App\Middleware' => __DIR__ . '/src/App/Middleware',
    'App\Services' => __DIR__ . '/src/App/Services',
    'App\Exceptions' => __DIR__ . '/src/App/Exceptions'
];

spl_autoload_register(
    function (string $classname) use ($classmap) {
        echo 'classname:' ;
        dd($classname);
        $classname_parts = explode('\\', $classname);
        $classfile = array_pop($classname_parts) . '.php';
        $namespace = implode(DIRECTORY_SEPARATOR, $classname_parts);
        if (!array_key_exists($namespace, $classmap)) {
            return;
        }
        echo 'classfile:';
        dd($classfile);
        $file = $classmap[$namespace] . DIRECTORY_SEPARATOR . $classfile;
        if (!file_exists($file) && !class_exists($classname)) {
            return;
        }
        
        require_once $file;
    }
);