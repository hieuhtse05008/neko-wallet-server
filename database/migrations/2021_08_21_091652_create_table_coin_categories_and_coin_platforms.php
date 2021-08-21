<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCoinCategoriesAndCoinPlatforms extends Migration
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
            ->create('coin_categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_id')->unique();
            $table->string('name');
            $table->timestamps();
        });
        Schema::connection($connection)
            ->create('asset_platforms', function (Blueprint $table) {
            $table->id();
            $table->string('asset_platform_id')->unique();
            $table->string('chain_identifier')->nullable();
            $table->string('name')->nullable();
            $table->string('short_name')->nullable();
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
        Schema::dropIfExists('table_coin_categories_and_coin_platforms');
    }
}
