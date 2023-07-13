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
 * @see https://github.com/cashbox-laravel/foundation
 */

declare(strict_types=1);

namespace Cashbox\Sber\QrCode\Requests;

use Cashbox\Sber\QrCode\Constants\Body;
use Cashbox\Sber\QrCode\Constants\Scopes;

class Cancel extends BaseRequest
{
    protected $path = '/ru/prod/order/v1/cancel';

    protected $auth_extra = [
        Body::SCOPE => Scopes::CANCEL,
    ];

    protected $reload_relations = true;

    public function getRawBody(): array
    {
        return [
            Body::REQUEST_ID   => $this->uniqueId(),
            Body::REQUEST_TIME => $this->currentTime(),

            Body::TERMINAL_ID => $this->model->getTerminalId(),

            Body::EXTERNAL_ID  => $this->model->getExternalId(),
            Body::OPERATION_ID => $this->model->getOperationId(),

            Body::OPERATION_CURRENCY => $this->model->getCurrency(),

            Body::AUTH_CODE => $this->getAuthCode(),

            Body::CANCEL_SUM => $this->model->getSum(),
        ];
    }

    protected function getAuthCode(): string
    {
        return (string) $this->model->getSum();
    }
}
