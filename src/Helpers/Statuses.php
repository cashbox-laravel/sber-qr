<?php

namespace Helldar\CashierDriver\Sber\QrCode\Helpers;

use Helldar\Cashier\Helpers\Statuses as BaseStatus;

class Statuses extends BaseStatus
{
    public const NEW = [
        'CREATED',
    ];

    public const REFUNDED = [
        'REVERSED',
        'REFUNDED',
        'REVOKED',
    ];

    public const FAILED = [
    ];

    public const SUCCESS = [
        'PAID',
    ];
}
