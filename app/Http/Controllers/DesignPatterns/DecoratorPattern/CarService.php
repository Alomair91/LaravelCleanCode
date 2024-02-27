<?php
namespace App\Http\Controllers\DesignPatterns\DecoratorPattern;

interface CarServiceInterface
{
    public function getCost();

    public function getDescription();
}

class BasicInspection implements CarServiceInterface
{

    public function getCost()
    {
        return 20;
    }

    public function getDescription()
    {
        return "Basic inspection";
    }
}

class OilChange implements CarServiceInterface
{
    protected $carService;

    public function __construct(CarServiceInterface $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 30 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return $this->carService->getDescription() . ", and oil change";
    }
}

class TireRotation implements CarServiceInterface
{
    protected $carService;

    public function __construct(CarServiceInterface $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 50 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return $this->carService->getDescription() . ", and a tire rotation";
    }
}

class CarService
{
    public function begin()
    {
        $service = new OilChange(new TireRotation(new BasicInspection()));
        return [
            "cost" => $service->getCost(),
            "description" => $service->getDescription()
        ];
    }
}
