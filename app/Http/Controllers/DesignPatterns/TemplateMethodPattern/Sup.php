<?php

namespace App\Http\Controllers\DesignPatterns\TemplateMethodPattern;

abstract class Sup
{
    public function make()
    {
        var_dump("===================== " . $this->type());
        return $this
            ->layBread()
            ->addLettuce()
            ->addPrimaryToppings()
            ->addSauces();
    }

    protected abstract function type();

    protected function layBread()
    {
        var_dump("laying down the Bread");
        return $this;
    }

    protected function addLettuce()
    {
        var_dump("add some lettuce");
        return $this;
    }

    protected function addSauces()
    {
        var_dump("add oil and vinegar");
        return $this;
    }

    protected abstract function addPrimaryToppings(): self;
}
