<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCryptocurrencyInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tokens', function (Blueprint $table) {
            $table->timestamps();
        });
        Schema::table('cryptocurrencies_mapping', function (Blueprint $table) {
            $table->timestamps();
        });
        Schema::create('cryptocurrency_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cryptocurrency_id')->nullable();
            $table->foreign('cryptocurrency_id')->references('id')->on('cryptocurrencies');
            $table->text('description')->nullable();
            $table->jsonb('links')->nullable();
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->text('name')->unique();
            $table->timestamps();
        });

        Schema::create('cryptocurrency_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cryptocurrency_id')->nullable();
            $table->foreign('cryptocurrency_id')->references('id')->on('cryptocurrencies');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });

        Schema::create('exchange_guides', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->string('image_url')->nullable();
            $table->string('coingecko_id')->nullable();
            $table->text('guide_html')->nullable();

            $table->timestamps();
        });
        Schema::create('exchange_pairs', function (Blueprint $table) {
            $table->id();

            $table->text('trade_url')->nullable();
            $table->unsignedBigInteger('base_token_id')->nullable();
            $table->foreign('base_token_id')->references('id')->on('tokens');
            $table->unsignedBigInteger('target_token_id')->nullable();
            $table->foreign('target_token_id')->references('id')->on('tokens');
            $table->unsignedBigInteger('exchange_guide_id')->nullable();
            $table->foreign('exchange_guide_id')->references('id')->on('exchange_guides');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('cryptocurrency_info');
    }
}
