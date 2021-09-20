<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMarketInfoCryptocurrency extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cryptocurrency_info', function (Blueprint $table) {
            $table->double('current_supply')->nullable();
            $table->double('max_supply')->nullable();
            $table->double('market_cap_dominance')->nullable();
            $table->double('holder_count')->nullable();
            $table->double('fully_diluted_market_cap')->nullable();

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
