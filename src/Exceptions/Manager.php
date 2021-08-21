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

namespace Helldar\CashierDriver\Sber\QrCode\Exceptions;

use Helldar\Cashier\Exceptions\Http\BadRequestClientException;
use Helldar\Cashier\Exceptions\Http\BankInternalErrorException;
use Helldar\Cashier\Exceptions\Http\MethodNotFoundException;
use Helldar\Cashier\Exceptions\Http\TooManyRequestsException;
use Helldar\Cashier\Exceptions\Http\UnauthorizedException;
use Helldar\Cashier\Exceptions\Manager as ExceptionManager;

class Manager extends ExceptionManager
{
    protected $codes = [
        400 => BadRequestClientException::class,
        401 => UnauthorizedException::class,
        405 => MethodNotFoundException::class,
        429 => TooManyRequestsException::class,

        500 => BankInternalErrorException::class,
        503 => BankInternalErrorException::class,
    ];

    protected $code_keys = ['httpCode'];
}
