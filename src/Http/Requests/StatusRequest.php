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

class StatusRequest extends BaseRequest
{
    protected string $productionUri = '/ru/prod/order/v1/status';

    public function body(): array
    {
        return [
            Body::REQUEST_ID   => $this->uniqueId(),
            Body::REQUEST_TIME => $this->currentTime(),

            Body::EXTERNAL_ID => $this->resource->externalId(),
        ];
    }

    protected function authExtra(): array
    {
        return [Body::SCOPE => Scope::STATUS];
    }
}
