<?php

declare(strict_types=1);

namespace Tests\Concerns;

use Tests\Fixtures\Factories\Payment;
use Tests\Fixtures\Models\RequestPayment;

trait Database
{
    protected function defineDatabaseMigrations()
    {
        $this->artisan('migrate:reset')->run();

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->artisan('migrate')->run();
    }

    protected function payment(): RequestPayment
    {
        return Payment::create();
    }
}
