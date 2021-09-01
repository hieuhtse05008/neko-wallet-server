<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbV2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('networks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('chain_id')->nullable();
            $table->text('icon_url')->nullable();
            $table->string('short_name')->nullable();
            $table->string('symbol')->nullable();
            $table->string('wallet_derive_path')->nullable();
            $table->boolean('is_active')->default(false);

        });
        Schema::create('networks_mapping', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('network_id')->nullable();
            $table->foreign('network_id')->references('id')->on('networks');            $table->string('coingecko_id')->nullable();
            $table->string('cmc_id')->nullable();
            $table->string('binance_id')->nullable();
        });
        Schema::create('cryptocurrencies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('symbol');
            $table->text('slug');
            $table->text('icon_url')->nullable();
            $table->integer('rank')->nullable();
            $table->boolean('verified')->default(false);
        });
        Schema::create('cryptocurrencies_mapping', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cryptocurrency_id');
            $table->string('coingecko_id')->nullable();
            $table->string('cmc_id')->nullable();
            $table->string('binance_id')->nullable();
        });
        Schema::create('tokens', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('symbol');
            $table->integer('decimals');
            $table->string('address');
            $table->text('icon_url')->nullable();
            $table->boolean('verified')->default(false);
            $table->boolean('active_wallet')->default(false);
            $table->unsignedBigInteger('cryptocurrency_id')->nullable();
            $table->foreign('cryptocurrency_id')->references('id')->on('cryptocurrencies');
            $table->unsignedBigInteger('network_id')->nullable();
            $table->foreign('network_id')->references('id')->on('networks');

        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
