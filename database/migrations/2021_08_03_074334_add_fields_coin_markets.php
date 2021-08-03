<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsCoinMarkets extends Migration
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
            ->table('coin_markets_data', function (Blueprint $table) {

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
