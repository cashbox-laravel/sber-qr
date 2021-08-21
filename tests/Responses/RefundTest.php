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

namespace Tests\Responses;

use Helldar\Cashier\Http\Response as BaseResponse;
use Helldar\CashierDriver\Sber\QrCode\Responses\Refund;
use Helldar\Contracts\Cashier\Http\Response;
use Tests\TestCase;

class RefundTest extends TestCase
{
    public function testInstance()
    {
        $response = $this->response();

        $this->assertInstanceOf(Refund::class, $response);
        $this->assertInstanceOf(Response::class, $response);
    }

    public function testGetExternalId()
    {
        $response = $this->response();

        $this->assertSame(self::PAYMENT_EXTERNAL_ID, $response->getExternalId());
    }

    public function testGetStatus()
    {
        $response = $this->response();

        $this->assertSame('REVOKED', $response->getStatus());
    }

    public function testToArray()
    {
        $response = $this->response();

        $this->assertSame([
            BaseResponse::KEY_STATUS => 'REVOKED',
        ], $response->toArray());
    }

    protected function response(): Response
    {
        return Refund::make([
            'status' => [
                'order_id'    => self::PAYMENT_EXTERNAL_ID,
                'order_state' => 'REVOKED',
                'error'       => 0,
            ],
        ]);
    }
}
