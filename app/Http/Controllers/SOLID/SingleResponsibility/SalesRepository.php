<?php

namespace App\Http\Controllers\SOLID\SingleResponsibility;

use Illuminate\Support\Facades\DB;

class SalesRepository
{
    public function __construct()
    {
    }

    public function queryDBForSalesBetween($startDate, $endDate){
       // return DB::table("sales")->whereBetween('created_at', [$startDate, $endDate])->sum("charge") / 100;
        return 4564 / 100;
    }
}
