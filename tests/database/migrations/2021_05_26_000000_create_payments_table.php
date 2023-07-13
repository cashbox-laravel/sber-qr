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

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    protected $table = 'payments';

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->uuid('uuid');

            $table->smallInteger('type_id');
            $table->smallInteger('status_id');

            $table->double('sum', 10, 2)->default(0);

            $table->string('currency');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
