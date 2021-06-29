<?php

namespace Helldar\CashierDriver\Sber\QR\Resources;

use Helldar\Cashier\Resources\Response as Base;

final class Response extends Base
{
    protected $map = [];

    public function getUrl(): ?string
    {
        return $this->value('url');
    }
}
