<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoinInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $connection = config('database.connections.warehouse.database');
        Schema::connection($connection)
            ->table('coins', function (Blueprint $table) {
                $table->string('image_url')->nullable();
                $table->text('description')->nullable();
            });
        Schema::connection($connection)
            ->table('last_coin_markets_data', function (Blueprint $table) {
                $table->text('sparkline_7d')->nullable();
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
