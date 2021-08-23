# Sber QR Cashier Driver

Cashier provides an expressive, fluent interface to manage billing services.

[![Stable Version][badge_stable]][link_packagist]
[![Unstable Version][badge_unstable]][link_packagist]
[![Total Downloads][badge_downloads]][link_packagist]
[![License][badge_license]][link_license]

## Installation

To get the latest version of `Sber QR Cashier Driver`, simply require the project using [Composer](https://getcomposer.org):

```bash
$ composer require andrey-helldar/cashier-sber-qr
```

Or manually update `require` block of `composer.json` and run `composer update`.

```json
{
    "require": {
        "andrey-helldar/cashier-sber-qr": "^1.0"
    }
}
```

## Using

> See [parent](https://github.com/andrey-helldar/cashier#readme) project.

Create resource file:

```php
namespace App\Payments;

use Helldar\Cashier\Resources\Model;

class Sber extends Model
{
    protected function paymentId(): string
    {
        return (string) $this->model->id;
    }

    protected function sum(): float
    {
        return (float) $this->model->sum;
    }

    protected function currency(): int
    {
        return $this->model->currency;
    }

    protected function createdAt(): Carbon
    {
        return $this->model->created_at;
    }
    
    public function getMemberId(): string
    {
        return config('cashier.drivers.sber_qr.member_id');
    }
    
    public function getTerminalId(): string
    {
        return config('cashier.drivers.sber_qr.terminal_id');
    }
}
```

Edit the `config/cashier.php` file:

```php
use App\Models\Payment;
use App\Payments\Sber as SberDetails;
use Helldar\Cashier\Constants\Driver;
use Helldar\CashierDriver\Sber\QrCode\Driver as SberQrDriver;

return [
    //

    'payment' => [
        'map' => [
            Payment::TYPE_SBER => 'sber_qr'
        ]
    ],

    'drivers' => [
        'sber_qr' => [
            Driver::DRIVER => SberQrDriver::class,

            Driver::DETAILS => SberDetails::class,
            
            Driver::CERTIFICATE_PATH => env('CASHIER_SBER_QR_CERTIFICATE_PATH'),
            Driver::CERTIFICATE_PASSWORD => env('CASHIER_SBER_QR_CERTIFICATE_PASSWORD'),

            Driver::CLIENT_ID       => env('CASHIER_SBER_QR_CLIENT_ID'),
            Driver::CLIENT_SECRET   => env('CASHIER_SBER_QR_CLIENT_SECRET'),

            'member_id'   => env('CASHIER_SBER_QR_MEMBER_ID'),
            'terminal_id' => env('CASHIER_SBER_QR_TERMINAL_ID'),
        ]
    ]
];
```

## For Enterprise

Available as part of the Tidelift Subscription.

The maintainers of `andrey-helldar/cashier-sber-qr` and thousands of other packages are working with Tidelift to deliver commercial support and maintenance for the open source
packages you use to build your applications. Save time, reduce risk, and improve code health, while paying the maintainers of the exact packages you
use. [Learn more](https://tidelift.com/subscription/pkg/packagist-andrey-helldar-cashier-sber-qr?utm_source=packagist-andrey-helldar-cashier-sber&utm_medium=referral&utm_campaign=enterprise&utm_term=repo)
.

[badge_downloads]:      https://img.shields.io/packagist/dt/andrey-helldar/cashier-sber-qr.svg?style=flat-square

[badge_license]:        https://img.shields.io/packagist/l/andrey-helldar/cashier-sber-qr.svg?style=flat-square

[badge_stable]:         https://img.shields.io/github/v/release/andrey-helldar/cashier-sber-qr?label=stable&style=flat-square

[badge_unstable]:       https://img.shields.io/badge/unstable-dev--main-orange?style=flat-square

[link_license]:         LICENSE

[link_packagist]:       https://packagist.org/packages/andrey-helldar/cashier-sber-qr
