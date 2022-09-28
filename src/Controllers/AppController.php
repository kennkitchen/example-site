<?php

namespace App\Controllers;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use const App\ROOT_DIR;

class AppController
{
    private $loader;
    protected $twig;

    public function __construct()
    {
        $this->loader = new FilesystemLoader(ROOT_DIR . '/templates/pages');
        $this->twig = new Environment($this->loader, [
//    'cache' => 'cache/twig',
        ]);
    }

}