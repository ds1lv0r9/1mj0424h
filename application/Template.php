<?php


class Template
{
    public function render($name, $data)
    {
        require_once 'templates/' . $name;
    }
}
