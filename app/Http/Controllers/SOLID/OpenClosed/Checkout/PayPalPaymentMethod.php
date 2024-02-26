<?php

namespace App\Http\Controllers\SOLID\OpenClosed\Checkout;

class PayPalPaymentMethod implements PaymentMethodInterface
{

    public function acceptPayment($receipt)
    {
        return "Pay with paypal: " . $receipt->amount;
    }
}
