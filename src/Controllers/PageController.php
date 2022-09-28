<?php

namespace App\Controllers;

class PageController extends AppController {

    public function __construct() {
        parent::__construct();
    }

    public function pageHandler($page) {
        $template = $this->twig->load( strtolower($page) . '.twig');
        $title = ucwords($page);
//        switch ($page) {
//            case '/':
//                $title = "Home";
//                $template = $this->twig->load('home.twig');
//                break;
//            case '/about':
//                $title = "About";
//                $template = $this->twig->load('about.twig');
//                break;
//        }

        return $template->render(['page_title' => $title, 'a_variable' => 'You are here!!!']);
    }

}