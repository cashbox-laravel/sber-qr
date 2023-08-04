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

namespace Cashbox\Sber\QrCode\Services;

use Cashbox\Core\Services\Statuses as BaseStatus;

class Statuses extends BaseStatus
{
    public const FAILED    = [];
    public const NEW       = ['CREATED'];
    public const REFUNDED  = ['REVERSED', 'REFUNDED', 'REVOKED'];
    public const REFUNDING = [];
    public const SUCCESS   = ['PAID'];
}
