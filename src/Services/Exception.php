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

use Cashbox\Core\Exceptions\External\BankInternalErrorHttpException;
use Cashbox\Core\Exceptions\External\MethodNotFoundHttpException;
use Cashbox\Core\Exceptions\External\TooManyRequestsHttpException;
use Cashbox\Core\Exceptions\External\UnauthorizedHttpException;
use Cashbox\Core\Services\Exception as BaseException;

class Exception extends BaseException
{
    protected array $codes = [
        401 => UnauthorizedHttpException::class,
        405 => MethodNotFoundHttpException::class,
        429 => TooManyRequestsHttpException::class,

        500 => BankInternalErrorHttpException::class,
        501 => BankInternalErrorHttpException::class,
        502 => BankInternalErrorHttpException::class,
        503 => BankInternalErrorHttpException::class,
    ];

    protected array $codeKeys = ['httpCode', 'status.error_code'];

    protected array $reasonKeys = ['moreInformation', 'httpMessage', 'Message', 'status.error_description'];
}
