<?php

namespace Helldar\CashierDriver\Sber\QR;

use Helldar\Cashier\DTO\Response;
use Helldar\Cashier\Services\Driver as BaseDriver;
use Helldar\CashierDriver\Sber\QR\Helpers\Statuses;

class Driver extends BaseDriver
{
    protected $statuses = Statuses::class;

    protected $production_host = 'https://api.sberbank.ru';

    protected $dev_host = 'https://dev.api.sberbank.ru';

    public function init(): Response
    {
        // TODO: Implement init() method.
    }

    public function check(): Response
    {
        // TODO: Implement check() method.
    }

    public function refund(): Response
    {
        // TODO: Implement refund() method.
    }
}
