<?php

/**
 * This file is part of the "cashier-provider/foundation" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2023 Andrey Helldar
 * @license MIT
 *
 * @see https://github.com/cashier-provider/foundation
 */

declare(strict_types=1);

namespace CashierProvider\Sber\QrCode\Requests;

use CashierProvider\Sber\QrCode\Constants\Body;
use CashierProvider\Sber\QrCode\Constants\Scopes;

class Status extends BaseRequest
{
    protected $path = '/ru/prod/order/v1/status';

    protected $auth_extra = [
        Body::SCOPE => Scopes::STATUS,
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
