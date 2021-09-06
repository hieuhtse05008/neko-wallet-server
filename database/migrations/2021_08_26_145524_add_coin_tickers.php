<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoinTickers extends Migration
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
                $table->text('tickers')->nullable();
                $table->text('links')->nullable();
                $table->unsignedBigInteger('views')->default(0);
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
