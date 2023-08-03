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

namespace Cashbox\Sber\QrCode\Resources;

use Cashbox\Core\Resources\Details as BaseDetails;

class Details extends BaseDetails
{
    protected $url;

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function toArray(): array
    {
        return [
            'status' => $this->status,
            'url'    => $this->url,
        ];
    }
}
