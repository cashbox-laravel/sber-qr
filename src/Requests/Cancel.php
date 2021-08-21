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

namespace Helldar\CashierDriver\Sber\QrCode\Requests;

use Helldar\CashierDriver\Sber\QrCode\Constants\Body;
use Helldar\CashierDriver\Sber\QrCode\Constants\Scopes;

class Cancel extends BaseRequest
{
    protected $path = '/ru/prod/order/v1/revocation';

    protected $auth_extra = [
        Body::SCOPE => Scopes::CANCEL,
    ];

    public function getRawBody(): array
    {
        return [
            Body::REQUEST_ID   => $this->uniqueId(),
            Body::REQUEST_TIME => $this->currentTime(),

            Body::EXTERNAL_ID => $this->model->getExternalId(),
        ];
    }
}
