<?php

/*
 * This file is part of the "cashier-provider/sber-qr" project.
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
 * @see https://github.com/cashier-provider/sber-qr
 */

namespace SberQR\src;

use CashierProvider\Core\Services\Driver as BaseDriver;
use SberQR\src\Exceptions\Manager;
use SberQR\src\Helpers\Statuses;
use SberQR\src\Requests\Cancel;
use SberQR\src\Requests\Create;
use SberQR\src\Requests\Status;
use SberQR\src\Resources\Details;
use SberQR\src\Responses\Cancel as CancelResponse;
use SberQR\src\Responses\QrCode;
use SberQR\src\Responses\Status as StatusResponse;
use DragonCode\Contracts\Cashier\Http\Response;

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
