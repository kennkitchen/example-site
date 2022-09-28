<?php
// src/Routes/Router.php

namespace App\Routes;

use App\Routes\Request;
use App\Controllers\PageController;

class Router {
    private Request $request;

    private array $supportedHttpMethods = array(
        "GET",
        "POST"
    );

    function __construct(Request $request) {
        $this->request = $request;
    }

    public function handleRequest() {
        if (!in_array($this->request->requestMethod, $this->supportedHttpMethods)) {
            //todo handle better!
            var_dump($this->request); die;
        }

        // fix home todo This could be a setting
        // also todo This could be part of the removeSlashes (i.e. cleaning up the route)
        if ($this->request->requestUri == "/") {
            $requestUri = "/home";
        } else {
            $requestUri = $this->request->requestUri;
        }

        if (strlen($this->request->queryString) > 0) {
            //todo handle parms
        }

        //todo Handle when there's more than one "/" (i.e. /users vs. /users/add)

        //todo Pages are handled differently (but right now they're all we handle)
        $page = new PageController();
        $output = $page->pageHandler($this->removeSlashes($requestUri));

        return $output;

    }

    private function removeSlashes($route) {
        $result = ltrim(rtrim($route, '/'), '/');
        if ($result === '')
        {
            return '/';
        }
        return $result;
    }



}