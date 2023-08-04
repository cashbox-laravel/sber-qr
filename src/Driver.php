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
 * @see https://cashbox.city
 */

declare(strict_types=1);

namespace Cashbox\Sber\QrCode;

use Cashbox\Core\Http\Response as BaseResponse;
use Cashbox\Core\Services\Driver as BaseDriver;
use Cashbox\Sber\QrCode\Http\Requests\CancelRequest;
use Cashbox\Sber\QrCode\Http\Requests\CreateRequest;
use Cashbox\Sber\QrCode\Http\Requests\StatusRequest;
use Cashbox\Sber\QrCode\Http\Responses\QrCodeResponse;
use Cashbox\Sber\QrCode\Http\Responses\Response;
use Cashbox\Sber\QrCode\Services\Exception;
use Cashbox\Sber\QrCode\Services\Statuses;

class Driver extends BaseDriver
{
    protected string $statuses = Statuses::class;

    protected string $exception = Exception::class;

    protected string $response = Response::class;

    public function start(): BaseResponse
    {
        return $this->request(CreateRequest::class, QrCodeResponse::class);
    }

    public function verify(): BaseResponse
    {
        return $this->request(StatusRequest::class);
    }

    public function refund(): BaseResponse
    {
        return $this->request(CancelRequest::class);
    }
}
