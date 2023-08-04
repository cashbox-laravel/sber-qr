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

namespace Cashbox\Sber\QrCode\Http\Responses;

use Cashbox\Core\Http\Response as BaseResponse;
use Spatie\LaravelData\Attributes\MapInputName;

class Response extends BaseResponse
{
    #[MapInputName('status.order_state')]
    public ?string $status;

    #[MapInputName('status.order_id')]
    public string $externalId;

    #[MapInputName('status.order_operation_params.0.operation_id')]
    public string $operationId;
}
