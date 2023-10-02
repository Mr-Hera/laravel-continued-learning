<?php

namespace App\Billing;


interface PaymentGatewayContract
{
    // set discount if any
    public function setDiscount($amount);

    // charge the bank
    public function charge($amount);
}