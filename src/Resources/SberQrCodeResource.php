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

use Cashbox\Core\Resources\Resource;
use DateTimeInterface;

abstract class SberQrCodeResource extends Resource
{
    public function certificatePath(): ?string
    {
        return $this->config->credentials->extra['certificate_path'] ?? null;
    }

    public function certificatePassword(): ?string
    {
        return $this->config->credentials->extra['certificate_password'] ?? null;
    }

    public function memberId(): string
    {
        return $this->config->credentials->extra['member_id'];
    }

    public function terminalId(): string
    {
        return $this->config->credentials->clientId;
    }

    public function createdAt(): DateTimeInterface
    {
        return $this->payment->created_at;
    }
}
