<?php

namespace App\Http\Controllers\SOLID\OpenClosed\Checkout;

class Checkout
{
    public function begin(Receipt $receipt, PaymentMethodInterface $paymentMethod)
    {
       return $paymentMethod->acceptPayment($receipt);
    }
}
