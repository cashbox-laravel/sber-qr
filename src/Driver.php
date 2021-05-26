<?php

namespace Helldar\CashierDriver\Sber\QR;

use Helldar\Cashier\Services\Driver as BaseDriver;
use Helldar\CashierDriver\Sber\Helpers\Statuses;

class Driver extends BaseDriver
{
    protected $statuses = Statuses::class;

    protected $production_host = 'https://api.sberbank.ru';

    protected $dev_host = 'https://dev.api.sberbank.ru';
}
