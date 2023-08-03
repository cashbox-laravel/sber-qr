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

namespace Cashbox\Sber\QrCode\Requests;

use Cashbox\Sber\QrCode\Constants\Body;
use Cashbox\Sber\QrCode\Constants\Scopes;

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
