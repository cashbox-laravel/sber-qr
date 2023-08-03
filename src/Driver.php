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

namespace Cashbox\Sber\QrCode;

use Cashbox\Core\Services\Driver as BaseDriver;
use Cashbox\Sber\QrCode\Exceptions\Manager;
use Cashbox\Sber\QrCode\Helpers\Statuses;
use Cashbox\Sber\QrCode\Requests\Cancel;
use Cashbox\Sber\QrCode\Requests\Create;
use Cashbox\Sber\QrCode\Requests\Status;
use Cashbox\Sber\QrCode\Resources\Details;
use Cashbox\Sber\QrCode\Responses\Cancel as CancelResponse;
use Cashbox\Sber\QrCode\Responses\QrCode;
use Cashbox\Sber\QrCode\Responses\Status as StatusResponse;
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
