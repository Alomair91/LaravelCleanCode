<?php

namespace App\Http\Controllers\SOLID\SingleResponsibility;

class JsonOutput implements SalesOutputInterface
{

    public function output($sales)
    {
        return [
            "sales" => $sales
        ];
    }
}
