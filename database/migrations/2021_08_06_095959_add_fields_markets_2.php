<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsMarkets2 extends Migration
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
            ->table('coin_markets_data', function (Blueprint $table) {
                $table->text('price_change_percentage_1h_in_currency')->nullable();
                $table->text('price_change_percentage_7d_in_currency')->nullable();
                $table->text('price_change_percentage_30d_in_currency')->nullable();
                $table->text('price_change_percentage_1y_in_currency')->nullable();
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
