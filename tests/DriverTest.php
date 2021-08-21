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

namespace Tests;

use Helldar\Cashier\Http\Response;
use Helldar\Cashier\Services\Jobs;
use Helldar\CashierDriver\Sber\QrCode\Driver as QR;
use Helldar\Contracts\Cashier\Driver as DriverContract;
use Helldar\Contracts\Cashier\Http\Response as ResponseContract;
use Helldar\Support\Facades\Http\Url;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Fixtures\Models\RequestPayment;

class DriverTest extends TestCase
{
    use RefreshDatabase;

    protected $model = RequestPayment::class;

    public function testStart()
    {
        $response = $this->driver()->start();

        $this->assertInstanceOf(Response::class, $response);
        $this->assertInstanceOf(ResponseContract::class, $response);

        $this->assertIsString($response->getExternalId());
        $this->assertMatchesRegularExpression('/^(\d+)$/', $response->getExternalId());

        $this->assertSame(self::STATUS, $response->getStatus());

        $this->assertTrue(Url::is($response->getUrl()));
    }

    public function testCheck()
    {
        Jobs::make($this->payment())->start();

        $response = $this->driver()->check();

        $this->assertInstanceOf(Response::class, $response);
        $this->assertInstanceOf(ResponseContract::class, $response);

        $this->assertIsString($response->getExternalId());
        $this->assertMatchesRegularExpression('/^(\d+)$/', $response->getExternalId());

        $this->assertSame(self::STATUS, $response->getStatus());

        $this->assertSame([
            'status' => self::STATUS,
        ], $response->toArray());
    }

    public function testRefund()
    {
        Jobs::make($this->payment())->start();

        $response = $this->driver()->refund();

        $this->assertInstanceOf(Response::class, $response);
        $this->assertInstanceOf(ResponseContract::class, $response);

        $this->assertIsString($response->getExternalId());
        $this->assertMatchesRegularExpression('/^(\d+)$/', $response->getExternalId());

        $this->assertSame('REVOKED', $response->getStatus());
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->runSeeders();
    }

    protected function driver(): DriverContract
    {
        $model = $this->payment();

        $config = $this->config();

        return QR::make($config, $model);
    }

    protected function payment(): RequestPayment
    {
        return RequestPayment::firstOrFail();
    }
}
