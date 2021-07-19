<?php

namespace Helldar\CashierDriver\Sber\QrCode\Resources;

use Helldar\Cashier\Resources\Response as Base;

class Response extends Base
{
    public const KEY_URL = 'url';

    protected $map = [
        self::KEY_PAYMENT_ID => 'status.order_id',
        self::KEY_STATUS     => 'status.order_state',
        self::KEY_URL        => 'status.order_form_url',
    ];

    public function getUrl(): ?string
    {
        return $this->value(self::KEY_URL);
    }
}
