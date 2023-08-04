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

namespace Cashbox\Sber\QrCode\Http\Requests;

use Cashbox\Sber\QrCode\Constants\Body;
use Cashbox\Sber\QrCode\Constants\Scope;

class CreateRequest extends BaseRequest
{
    protected string $productionUri = '/ru/prod/order/v1/creation';

    public function body(): array
    {
        return [
            Body::REQUEST_ID   => $this->uniqueId(),
            Body::REQUEST_TIME => $this->currentTime(),

            Body::MEMBER_ID   => $this->resource->memberId(),
            Body::TERMINAL_ID => $this->resource->terminalId(),

            Body::ORDER_ID         => $this->resource->paymentId(),
            Body::ORDER_SUM        => $this->resource->sum(),
            Body::ORDER_CURRENCY   => $this->resource->currency(),
            Body::ORDER_CREATED_AT => $this->resource->createdAt(),
        ];
    }

    protected function authExtra(): array
    {
        return [Body::SCOPE => Scope::CREATE];
    }
}
