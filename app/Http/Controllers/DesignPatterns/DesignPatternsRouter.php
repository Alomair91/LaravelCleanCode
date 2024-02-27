<?php

namespace App\Http\Controllers\DesignPatterns;

use App\Http\Controllers\DesignPatterns\DecoratorPattern\CarService;
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
        $this->decoratorPattern();
    }

    public function decoratorPattern()
    {
        $this->router->get('design-patterns/decorator-pattern/car-service', function () {
            $service = new CarService();
            return $service->begin();
        });
    }
}
