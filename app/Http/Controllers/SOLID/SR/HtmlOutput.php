<?php

namespace App\Http\Controllers\SOLID\SR;

class HtmlOutput implements SalesOutputInterface
{

    public function output($sales)
    {
        return "<h1>Sales: $sales</h1>";
    }
}
