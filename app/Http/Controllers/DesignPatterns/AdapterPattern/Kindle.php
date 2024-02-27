<?php

namespace App\Http\Controllers\DesignPatterns\AdapterPattern;

class Kindle implements KindleInterface
{

    public function turnOn()
    {
        return "User open the book";
    }

    public function pressNextButton()
    {
        return "User turn the page of the book";
    }
}
