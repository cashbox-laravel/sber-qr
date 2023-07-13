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
 * @see https://github.com/cashbox/foundation
 */

namespace CashierProvider\Sber\QrCode\Constants;

class Body
{
    public const REQUEST_ID         = 'rq_uid';
    public const REQUEST_TIME       = 'rq_tm';
    public const MEMBER_ID          = 'member_id';
    public const TERMINAL_ID        = 'id_qr';
    public const EXTERNAL_ID        = 'order_id';
    public const ORDER_ID           = 'order_number';
    public const ORDER_SUM          = 'order_sum';
    public const ORDER_CURRENCY     = 'currency';
    public const ORDER_CREATED_AT   = 'order_create_date';
    public const OPERATION_ID       = 'operation_id';
    public const OPERATION_CURRENCY = 'operation_currency';
    public const AUTH_CODE          = 'auth_code';
    public const CANCEL_SUM         = 'cancel_operation_sum';
    public const SCOPE              = 'scope';
}
