<?php

abstract class Controller
{

    public function redirect($url)
    {
        header("Location: ../$url");
    }

    public function loadView($view, $data = [])
    {
        extract($data);
        include(DIR . "/views/" . $view . ".php");
    }
}
