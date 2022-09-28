<?php

namespace App\Routes;

/**
 *
 */
class Request {
    /**
     * Class Constructor
     *
     * This iterates through all the things sent in a request and outputs them into an associative array.
     *
     */
    function __construct() {
        foreach($_SERVER as $key => $value) {
            //todo Maybe also some sanitizing?
            $this->{$this->toCamelCase($key)} = $value;
        }
    }

    /**
     * To Camel Case
     *
     * Convert all keys to Camel Case.
     *
     * @param $string
     * @return array|string|string[]
     */
    private function toCamelCase($string) {
        $result = strtolower($string);

        preg_match_all('/_[a-z]/', $result, $matches);

        foreach($matches[0] as $match)
        {
            $c = str_replace('_', '', strtoupper($match));
            $result = str_replace($match, $c, $result);
        }

        return $result;
    }

    //todo Not used yet so not finished.
    public function getBody() {
        if($this->requestMethod === "GET")
        {
            return;
        }

        if ($this->requestMethod == "POST")
        {

            $body = array();
            foreach($_POST as $key => $value)
            {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }

            return $body;
        }
    }
}