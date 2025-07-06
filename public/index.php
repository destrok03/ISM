<?php
// Démarrer la session
session_start();

// Définir le fuseau horaire si nécessaire
date_default_timezone_set('Africa/Dakar');

// Autoloader basique si besoin
spl_autoload_register(function ($class) {
    $paths = [
        '../Controllers/',
        '../Models/',
        '../Repositories/',
    ];

    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Charger les routes
require_once __DIR__ . '/../routes/web.php';


