<?php


class Autoload
{
    public function __construct()
    {
        $files = scandir(__DIR__ . "/");

        foreach ($files as $file) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            include_once $file;
        }
    }
}
