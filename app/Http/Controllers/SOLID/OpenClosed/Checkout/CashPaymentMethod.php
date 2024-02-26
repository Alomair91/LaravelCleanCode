<?php

namespace App\Http\Controllers\SOLID\OpenClosed\Checkout;

class CashPaymentMethod implements PaymentMethodInterface
{

    public function acceptPayment($receipt)
    {
        return "Pay with cash: " . $receipt->amount;
    }
}
