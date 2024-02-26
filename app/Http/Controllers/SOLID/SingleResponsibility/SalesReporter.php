<?php

namespace App\Http\Controllers\SOLID\SingleResponsibility;

class SalesReporter
{

    private SalesRepository $repository;

    public function __construct(SalesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function between($startDate, $endDate, SalesOutputInterface $formater)
    {
        $sales = $this->repository->queryDBForSalesBetween($startDate, $endDate);

        return $formater->output($sales);
    }

}
