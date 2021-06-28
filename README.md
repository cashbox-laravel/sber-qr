# Sber QR Cashier Driver

Cashier provides an expressive, fluent interface to manage billing services.

[![Stable Version][badge_stable]][link_packagist]
[![Unstable Version][badge_unstable]][link_packagist]
[![Total Downloads][badge_downloads]][link_packagist]
[![License][badge_license]][link_license]

## Installation

> Note!
>
> For this driver to work, you first need to [`andrey-helldar/cashier`](https://github.com/andrey-helldar/cashier) install.

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

1. You need to create a new class, for example, `App\Cashier\BankName\Requests\Payment`, and define methods in it:

```php
namespace App\Cashier\BankName\Requests;

use Carbon\Carbon;
use Helldar\CashierDriver\Sber\QR\Requests\Payment as Base;

class Payment extends Base
{
    protected function terminalId(): string { }

    protected function memberId(): string { }

    protected function uniqueId(): string { }

    protected function paymentId(): string { }

    protected function sum(): float { }

    protected function currency(): int { }

    protected function createdAt(): Carbon { }
}
```

2. Configure model and driver in [`config/cashier.php`](https://github.com/andrey-helldar/cashier/blob/main/config/cashier.php) file:

```php
use App\Models\Payment as Model;
use Helldar\Cashier\Constants\Status;

return [
    'payments' => [
        'model' => App\Models\Payment::class,
        
        'attributes' => [
            'type'     => 'type_id',
            'status'   => 'status_id',
            'sum'      => 'sum',
            'currency' => 'currency'
        ],
    
        'statuses' => [
            Status::NEW => Model::STATUS_NEW,
    
            Status::SUCCESS => Model::STATUS_SUCCESS,
    
            Status::FAILED => Model::STATUS_FAILED,
    
            Status::REFUND => Model::STATUS_REFUND,
    
            Status::WAIT_REFUND => Model::STATUS_WAIT_REFUND,
        ],
        
        'assign_drivers' => [
            Model::PAYMENT_TYPE_1 => 'sber_qr',
        ],
    ],

    'drivers' => [
        'sber_qr' => [
            'driver' => Helldar\CashierDriver\Sber\QR\Driver::class,

            'request' => App\Cashier\BankName\Requests\Payment::class,

            'client_id' => env('CASHIER_SBER_CLIENT_ID'),

            'client_secret' => env('CASHIER_SBER_CLIENT_SECRET'),
        ]
    ]
];
```

## For Enterprise

Available as part of the Tidelift Subscription.

The maintainers of `andrey-helldar/cashier` and thousands of other packages are working with Tidelift to deliver commercial support and maintenance for the open source packages you
use to build your applications. Save time, reduce risk, and improve code health, while paying the maintainers of the exact packages you
use. [Learn more](https://tidelift.com/subscription/pkg/packagist-andrey-helldar-cashier?utm_source=packagist-andrey-helldar-cashier&utm_medium=referral&utm_campaign=enterprise&utm_term=repo)
.

[badge_downloads]:      https://img.shields.io/packagist/dt/andrey-helldar/cashier-sber-qr.svg?style=flat-square

[badge_license]:        https://img.shields.io/packagist/l/andrey-helldar/cashier-sber-qr.svg?style=flat-square

[badge_stable]:         https://img.shields.io/github/v/release/andrey-helldar/cashier-sber-qr?label=stable&style=flat-square

[badge_unstable]:       https://img.shields.io/badge/unstable-dev--main-orange?style=flat-square

[link_license]:         LICENSE

[link_packagist]:       https://packagist.org/packages/andrey-helldar/cashier-sber-qr
