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

declare(strict_types=1);

namespace Tests\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Fixtures\Models\ReadyPayment;
use Tests\TestCase;

trait Database
{
    use RefreshDatabase;

    /** @var \Illuminate\Database\Eloquent\Model|string */
    protected $model = ReadyPayment::class;

    protected function payment(): Model
    {
        $model = $this->model;

        return $model::create([
            'type_id'   => TestCase::MODEL_TYPE_ID,
            'status_id' => TestCase::MODEL_STATUS_ID,

            'sum'      => TestCase::PAYMENT_SUM,
            'currency' => TestCase::CURRENCY,
        ]);
    }
}
