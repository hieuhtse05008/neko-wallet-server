<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesWarehouse extends Migration
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
            ->create('coins', function (Blueprint $table) {
                $table->id();
                $table->text('coin_id')->unique();
                $table->text('symbol');
                $table->text('name');
                $table->timestamps();
            });
        Schema::connection($connection)
            ->create('coin_markets_data', function (Blueprint $table) {
                $table->id();
                $table->text('coin_id');
                $table->text('current_price');
                $table->text('market_cap');
                $table->text('total_volume');
                $table->text('price_change_24h');
                $table->text('price_change_percentage_24h');
                $table->dateTime('last_updated')->nullable();
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $connection = config('database.connections.warehouse.database');
        Schema::connection($connection)
            ->dropIfExists('coins');
        Schema::connection($connection)
            ->dropIfExists('coin_markets_data');
    }
}
