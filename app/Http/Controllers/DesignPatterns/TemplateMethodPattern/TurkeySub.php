<?php

namespace App\Http\Controllers\DesignPatterns\TemplateMethodPattern;

class TurkeySub extends Sup
{

    protected function type()
    {
        return "TurkeySub";
    }

    protected function addPrimaryToppings(): Sup
    {
        var_dump("add some turkey");
        return $this;
    }
}
