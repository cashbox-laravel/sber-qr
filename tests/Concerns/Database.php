<?php

/*
 * This file is part of the "andrey-helldar/cashier-sber-qr" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@ai-rus.com>
 *
 * @copyright 2021 Andrey Helldar
 *
 * @license MIT
 *
 * @see https://github.com/andrey-helldar/cashier-sber-qr
 */

declare(strict_types=1);

namespace Tests\Concerns;

use Tests\Fixtures\Factories\Payment;
use Tests\Fixtures\Models\RequestPayment;

trait Database
{
    protected function defineDatabaseMigrations()
    {
        $this->artisan('migrate:fresh')->run();

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->artisan('migrate')->run();
    }

    protected function payment(): RequestPayment
    {
        return Payment::create();
    }
}
