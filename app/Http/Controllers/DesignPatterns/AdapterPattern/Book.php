<?php

namespace App\Http\Controllers\DesignPatterns\AdapterPattern;

class Book implements BookInterface
{

    public function open()
    {
        return "User open the book";
    }

    public function turnPage()
    {
        return "User turn the page of the book";
    }
}
