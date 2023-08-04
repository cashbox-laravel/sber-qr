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

use Carbon\Carbon;
use Cashbox\Core\Concerns\Config\Application;
use Cashbox\Core\Http\Request;
use Cashbox\Core\Services\Auth;
use Cashbox\Core\Services\Identifier;
use Cashbox\Sber\Auth\Auth as SberAuth;

abstract class BaseRequest extends Request
{
    use Application;

    protected string $productionHost = 'https://api.sberbank.ru';

    protected Auth|string|null $auth = SberAuth::class;

    public function options(): array
    {
        return [
            'cert' => [
                $this->resource->config->credentials->extra['certificate_path'],
                $this->resource->config->credentials->extra['certificate_password'],
            ],
        ];
    }

    protected function uniqueId(): string
    {
        return Identifier::getUnique();
    }

    protected function currentTime(): string
    {
        return Carbon::now()->setTimezone('UTC')->format('Y-m-d\TH:i:s\Z');
    }
}
