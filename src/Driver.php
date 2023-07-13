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
 * @see https://github.com/cashbox/foundation
 */

namespace CashierProvider\Sber\QrCode;

use CashierProvider\Core\Services\Driver as BaseDriver;
use CashierProvider\Sber\QrCode\Exceptions\Manager;
use CashierProvider\Sber\QrCode\Helpers\Statuses;
use CashierProvider\Sber\QrCode\Requests\Cancel;
use CashierProvider\Sber\QrCode\Requests\Create;
use CashierProvider\Sber\QrCode\Requests\Status;
use CashierProvider\Sber\QrCode\Resources\Details;
use CashierProvider\Sber\QrCode\Responses\Cancel as CancelResponse;
use CashierProvider\Sber\QrCode\Responses\QrCode;
use CashierProvider\Sber\QrCode\Responses\Status as StatusResponse;
use DragonCode\Contracts\Cashier\Http\Response;

class Driver extends BaseDriver
{
    protected $exception = Manager::class;

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
