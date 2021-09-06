<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoinMarketCapFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $connection = 'warehouse';

        Schema::connection($connection)
            ->table('coins', function (Blueprint $table) {

                $table->text('coin_market_cap_id')->nullable();
                $table->integer('holder_count')->default(0);
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
