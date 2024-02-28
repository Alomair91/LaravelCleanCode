<?php

namespace App\Http\Controllers\DesignPatterns;

use App\Http\Controllers\DesignPatterns\AdapterPattern\Book;
use App\Http\Controllers\DesignPatterns\AdapterPattern\Kindle;
use App\Http\Controllers\DesignPatterns\AdapterPattern\KindleAdapter;
use App\Http\Controllers\DesignPatterns\AdapterPattern\Nook;
use App\Http\Controllers\DesignPatterns\AdapterPattern\PersonReader;
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
        $this->adapterPattern();
    }

    public function decoratorPattern()
    {
        $this->router->get('design-patterns/decorator/car-service', function () {
            $service = new CarService();
            return $service->begin();
        });
    }

    // Adapter Pattern: An adapter allow us to translate one interface for use with another
    public function adapterPattern()
    {
        $this->router->get('design-patterns/adapter/reader', function () {
            $service = new PersonReader();
//            return $service->read(new Book);
//            return $service->read(new KindleAdapter(new Kindle));
            return $service->read(new KindleAdapter(new Nook));
        });
    }
}
