<?php

namespace Helldar\CashierDriver\Sber\Helpers;

use Helldar\Cashier\Helpers\Statuses as BaseStatus;

final class Statuses extends BaseStatus
{
    public const NEW = [
        'CREATED',
    ];

    public const REFUNDED = [
        'REVERSED',
        'REFUNDED',
    ];

    public const FAILED = [
        'REVOKED',
    ];

    public const SUCCESS = [
        'PAID',
    ];
}
