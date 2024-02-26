<?php

namespace App\Http\Controllers\SOLID\OpenClosed\AreaCalculator;

class AreCalculator
{
    public function calculate(array $shapes)
    {

        /** @var ShapeInterface $square */
        foreach ($shapes as $shape){
            $area[] = $shape->area();
        }
        return array_sum($area);
    }

}
