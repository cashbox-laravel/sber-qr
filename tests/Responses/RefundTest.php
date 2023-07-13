<?php

/**
 * This file is part of the "cashbox/foundation" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2023 Andrey Helldar
 * @license MIT
 *
 * @see https://github.com/cashbox-laravel/foundation
 */

namespace Tests\Responses;

use CashierProvider\Core\Http\ResponseInfo as BaseResponse;
use CashierProvider\Sber\QrCode\Responses\Cancel as CancelResponse;
use DragonCode\Contracts\Cashier\Http\Response;
use Tests\TestCase;

class RefundTest extends TestCase
{
    public function testInstance()
    {
        $response = $this->response();

        $this->assertInstanceOf(CancelResponse::class, $response);
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

        $this->assertSame('REVERSED', $response->getStatus());
    }

    public function testToArray()
    {
        $response = $this->response();

        $this->assertSame([
            BaseResponse::KEY_STATUS => 'REVERSED',
        ], $response->toArray());
    }

    protected function response(): Response
    {
        return CancelResponse::make([
            'status' => [
                'order_id'     => self::PAYMENT_EXTERNAL_ID,
                'order_status' => 'REVERSED',
                'error_code'   => 0,
            ],
        ]);
    }
}
