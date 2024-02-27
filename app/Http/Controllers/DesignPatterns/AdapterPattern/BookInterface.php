<?php

namespace App\Http\Controllers\DesignPatterns\AdapterPattern;

interface BookInterface
{
    public function open();
    public function turnPage();
}
