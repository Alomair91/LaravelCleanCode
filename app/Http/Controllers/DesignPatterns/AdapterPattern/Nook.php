<?php

namespace App\Http\Controllers\DesignPatterns\AdapterPattern;

class Nook implements EReaderInterface
{

    public function turnOn()
    {
        return "User open the Nook";
    }

    public function pressNextButton()
    {
        return "User turn the page of the Nook";
    }
}
