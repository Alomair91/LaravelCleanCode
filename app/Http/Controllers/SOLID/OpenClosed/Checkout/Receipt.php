<?php

namespace App\Http\Controllers\SOLID\OpenClosed\Checkout;

class Receipt
{
    public float $amount;

    public function __construct(float $amount)
    {
        $this->amount = $amount;
    }

}
