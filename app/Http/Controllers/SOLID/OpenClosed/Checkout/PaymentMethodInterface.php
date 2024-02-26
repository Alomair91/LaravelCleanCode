<?php

namespace App\Http\Controllers\SOLID\OpenClosed\Checkout;

interface PaymentMethodInterface
{
    public function acceptPayment($receipt);
}
