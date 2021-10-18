<?php

require './vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FileSystemLoader;

$loader = new FilesystemLoader(__DIR__.'/templates');
$view = new Environment($loader);

