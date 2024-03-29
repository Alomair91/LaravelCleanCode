<?php

namespace App\Http\Controllers\DesignPatterns\AdapterPattern;

class Kindle implements EReaderInterface
{

    public function turnOn()
    {
        return "User open the kindle";
    }

    public function pressNextButton()
    {
        return "User turn the page of the kindle";
    }
}
