<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLastMarketsDataTable extends Migration
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
            ->create('last_coin_markets_data', function (Blueprint $table) {
                $table->id();
                $table->text('coin_id')->unique();
                $table->text('current_price');
                $table->text('market_cap');
                $table->text('total_volume');
                $table->text('price_change_24h');
                $table->text('price_change_percentage_24h');
                $table->dateTime('last_updated')->nullable();
                $table->text('price_change_percentage_1h_in_currency')->nullable();
                $table->text('price_change_percentage_7d_in_currency')->nullable();
                $table->text('price_change_percentage_30d_in_currency')->nullable();
                $table->text('price_change_percentage_1y_in_currency')->nullable();
                $table->text('circulating_supply')->nullable();
                $table->text('total_supply')->nullable();
                $table->text('max_supply')->nullable();
                $table->text('market_cap_rank')->nullable();
                $table->text('fully_diluted_valuation')->nullable();
                $table->text('high_24h')->nullable();
                $table->text('ath')->nullable();
                $table->text('ath_change_percentage')->nullable();
                $table->text('ath_date')->nullable();
                $table->text('low_24h')->nullable();
                $table->text('atl')->nullable();
                $table->text('atl_change_percentage')->nullable();
                $table->text('atl_date')->nullable();
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
        Schema::dropIfExists('last_markets_data');
    }
}
