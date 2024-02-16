<?php

// Valid PHP Version?
$minPHPVersion = '7.2';
if (version_compare(phpversion(), $minPHPVersion, '<')) {
    die("Your PHP version must be {$minPHPVersion} or higher to run CodeIgniter. Current version: " . phpversion());
}
unset($minPHPVersion);

// Path to the front controller (this file)
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Location of the Paths config file.
$pathsPath = FCPATH . '../app/Config/Paths.php';

// Ensure the current directory is pointing to the front controller's directory
chdir(__DIR__);

// Load our paths config file
if (file_exists($pathsPath)) {
    require $pathsPath;
    $paths = new Config\Paths();

    // Location of the framework bootstrap file.
    $app = require rtrim($paths->systemDirectory, '/ ') . '/bootstrap.php';

    // Launch the application
    $app->run();
} else {
    die('Paths config file not found');
}
