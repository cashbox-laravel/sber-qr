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

namespace Tests\Observers;

use Helldar\Cashier\Constants\Status;
use Helldar\Cashier\Facades\Config\Payment as PaymentConfig;
use Helldar\Cashier\Providers\ObserverServiceProvider;
use Helldar\Cashier\Providers\ServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\Fixtures\Factories\Payment;
use Tests\Fixtures\Models\RequestPayment;
use Tests\TestCase;

class ObserverTest extends TestCase
{
    use RefreshDatabase;

    protected $model = RequestPayment::class;

    public function testCreate(): RequestPayment
    {
        $this->assertSame(0, DB::table('payments')->count());
        $this->assertSame(0, DB::table('cashier_details')->count());

        $payment = $this->payment();

        $payment->refresh();

        $this->assertSame(1, DB::table('payments')->count());
        $this->assertSame(1, DB::table('cashier_details')->count());

        $this->assertIsString($payment->cashier->external_id);
        $this->assertMatchesRegularExpression('/^(\d+)$/', $payment->cashier->external_id);

        $this->assertNull($payment->cashier->details->getUrl());

        $this->assertSame('PAID', $payment->cashier->details->getStatus());

        $this->assertSame(
            PaymentConfig::getStatuses()->getStatus(Status::SUCCESS),
            $payment->status_id
        );

        return $payment;
    }

    public function testUpdate()
    {
        $payment = $this->testCreate();

        $payment->update([
            'sum' => 34.56,
        ]);

        $payment->refresh();

        $this->assertSame(1, DB::table('payments')->count());
        $this->assertSame(1, DB::table('cashier_details')->count());

        $this->assertIsString($payment->cashier->external_id);
        $this->assertMatchesRegularExpression('/^(\d+)$/', $payment->cashier->external_id);

        $this->assertNull($payment->cashier->details->getUrl());

        $this->assertSame('PAID', $payment->cashier->details->getStatus());

        $this->assertSame(
            PaymentConfig::getStatuses()->getStatus(Status::SUCCESS),
            $payment->status_id
        );
    }

    protected function getPackageProviders($app): array
    {
        return [
            ServiceProvider::class,
            ObserverServiceProvider::class,
        ];
    }

    protected function payment(): RequestPayment
    {
        return Payment::create()->refresh();
    }
}
