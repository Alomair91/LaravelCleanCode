<?php

namespace App\Http\Controllers\DesignPatterns;

use App\Http\Controllers\DesignPatterns\AdapterPattern\Book;
use App\Http\Controllers\DesignPatterns\AdapterPattern\Kindle;
use App\Http\Controllers\DesignPatterns\AdapterPattern\KindleAdapter;
use App\Http\Controllers\DesignPatterns\AdapterPattern\Nook;
use App\Http\Controllers\DesignPatterns\AdapterPattern\PersonReader;
use App\Http\Controllers\DesignPatterns\DecoratorPattern\CarService;
use App\Http\Controllers\DesignPatterns\TemplateMethodPattern\TurkeySub;
use App\Http\Controllers\DesignPatterns\TemplateMethodPattern\VeggieSub;
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
        $this->templateMethodPattern();
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

    // Have public interface but subclasses are not allowed to change how these works
    public function templateMethodPattern()
    {
        $this->router->get('design-patterns/template-method', function () {
//            return (new TurkeySub())->make();
            return [
                "TurkeySub" => (new TurkeySub())->make(),
                "VeggieSub" => (new VeggieSub())->make(),
            ];
        });
    }
}
