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

namespace Cashbox\Sber\QrCode\Helpers;

use Cashbox\Core\Services\Statuses as BaseStatus;

class Statuses extends BaseStatus
{
    public const NEW = [
        'CREATED',
    ];
    public const REFUNDING = [];
    public const REFUNDED  = [
        'REVERSED',
        'REFUNDED',
        'REVOKED',
    ];
    public const FAILED  = [];
    public const SUCCESS = [
        'PAID',
    ];
}
