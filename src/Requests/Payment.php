<?php

namespace Helldar\CashierDriver\Sber\QR\Requests;

use Helldar\Cashier\Requests\Payment as BasePayment;

abstract class Payment extends BasePayment
{
    public function toArray(): array
    {
        return [
            'rq_tm' => $this->getNow(),

            'member_id' => $this->getMemberId(),
            'id_qr'     => $this->getTerminalId(),

            'order_number'      => $this->getPaymentId(),
            'order_create_date' => $this->getCreatedAt(),
            'order_sum'         => $this->getSum(),
            'currency'          => $this->getCurrency(),
        ];
    }

    protected function terminalId(): string
    {
        $this->validateMethod(static::class, __FUNCTION__);
    }

    protected function memberId(): string
    {
        $this->validateMethod(static::class, __FUNCTION__);
    }

    protected function getTerminalId(): string
    {
        return $this->terminalId();
    }

    protected function getMemberId(): string
    {
        return $this->memberId();
    }
}
