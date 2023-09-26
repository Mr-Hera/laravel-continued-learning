<?php

namespace App\Orders;

use App\Billing\PaymentGatewayContract;


class OrderDetails
{
    private $bankPaymentGateway;

    public function __construct(PaymentGatewayContract $bankPaymentGateway) {
        $this->bankPaymentGateway = $bankPaymentGateway;
    }

    public function all() {
        $this->bankPaymentGateway->setDiscount(500);

        return [
            'name' => 'Hera',
            'address' => 'Lavington Drive, 4th Avenue',
        ];
    }
}