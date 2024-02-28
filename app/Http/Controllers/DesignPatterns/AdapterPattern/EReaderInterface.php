<?php

namespace App\Http\Controllers\DesignPatterns\AdapterPattern;

interface EReaderInterface
{
    public function turnOn();
    public function pressNextButton();
}
