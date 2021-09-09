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

namespace Helldar\CashierDriver\Sber\QrCode;

use Helldar\Cashier\Services\Driver as BaseDriver;
use Helldar\CashierDriver\Sber\QrCode\Exceptions\Manager;
use Helldar\CashierDriver\Sber\QrCode\Helpers\Statuses;
use Helldar\CashierDriver\Sber\QrCode\Requests\Cancel;
use Helldar\CashierDriver\Sber\QrCode\Requests\Create;
use Helldar\CashierDriver\Sber\QrCode\Requests\Status;
use Helldar\CashierDriver\Sber\QrCode\Resources\Details;
use Helldar\CashierDriver\Sber\QrCode\Responses\QrCode;
use Helldar\CashierDriver\Sber\QrCode\Responses\Cancel as CancelResponse;
use Helldar\CashierDriver\Sber\QrCode\Responses\Status as StatusResponse;
use Helldar\Contracts\Cashier\Http\Response;

class Driver extends BaseDriver
{
    protected $exceptions = Manager::class;

    protected $statuses = Statuses::class;

    protected $details = Details::class;

    public function start(): Response
    {
        $request = Create::make($this->model);

        return $this->request($request, QrCode::class);
    }

    public function check(): Response
    {
        $request = Status::make($this->model);

        return $this->request($request, StatusResponse::class);
    }

    public function refund(): Response
    {
        $request = Cancel::make($this->model);

        return $this->request($request, CancelResponse::class);
    }
}
