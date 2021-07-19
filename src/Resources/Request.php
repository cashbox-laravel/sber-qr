<?php

namespace Helldar\CashierDriver\Sber\QrCode\Resources;

use Helldar\Cashier\Resources\Request as BasePayment;

abstract class Request extends BasePayment
{
    public function toArray(): array
    {
        return [
            'rq_uid' => $this->getUniqueId(),
            'rq_tm'  => $this->getNow(),

            'member_id' => $this->getMemberId(),
            'id_qr'     => $this->getTerminalId(),

            'order_number'      => $this->getPaymentId(),
            'order_create_date' => $this->getCreatedAt(),
            'order_sum'         => $this->getSum(),
            'currency'          => $this->getCurrency(),
        ];
    }

    public function getTerminalId(): string
    {
        return $this->terminalId();
    }

    public function getMemberId(): string
    {
        return $this->memberId();
    }

    protected function terminalId(): string
    {
        $this->validateMethod(static::class, __FUNCTION__);
    }

    protected function memberId(): string
    {
        $this->validateMethod(static::class, __FUNCTION__);
    }
}
