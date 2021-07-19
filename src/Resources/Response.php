<?php

namespace Helldar\CashierDriver\Sber\QrCode\Resources;

use Helldar\Cashier\Resources\Response as Base;

class Response extends Base
{
    protected $map = [];

    public function getUrl(): ?string
    {
        return $this->value('url');
    }
}
