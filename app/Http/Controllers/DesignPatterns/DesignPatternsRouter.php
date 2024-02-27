<?php

namespace App\Http\Controllers\DesignPatterns;

use Laravel\Lumen\Routing\Router;

class DesignPatternsRouter
{
    private Router $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function begin(): void
    {
    }
}
