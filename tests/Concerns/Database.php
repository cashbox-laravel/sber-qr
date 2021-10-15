<?php

declare(strict_types=1);

namespace Tests\Concerns;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Fixtures\Factories\Payment;
use Tests\Fixtures\Models\RequestPayment;

trait Database
{
    use RefreshDatabase;

    protected $pre_payment = true;

    protected function prePayment(): void
    {
        if ($this->pre_payment) {
            $this->payment($this->pre_payment);
        }
    }

    protected function payment(bool $enabled_events = false): RequestPayment
    {
        return Payment::create($enabled_events)->refresh();
    }
}
