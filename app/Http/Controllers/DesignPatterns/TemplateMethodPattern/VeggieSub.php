<?php

namespace App\Http\Controllers\DesignPatterns\TemplateMethodPattern;

class VeggieSub extends Sup
{

    protected function type()
    {
        return "VeggieSub";
    }

    protected function addPrimaryToppings(): Sup
    {
        var_dump("add some veggies");
        return $this;
    }
}
