<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsCoins extends Migration
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

                $table->text('asset_platform_id')->nullable();
                $table->text('platforms')->nullable();
                $table->text('categories')->nullable();
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
