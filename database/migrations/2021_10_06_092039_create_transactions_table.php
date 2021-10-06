<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        transactions
//	tx_hash
//	type (send/receive/swap/approve/execution-contract)
//	status (processing/completed/error)
//	time
//	fee?
//	fee_usd?
//	from?
//	to?
//	wallet_address?
//	block?
//	send_token?
//	send_quote?
//	send_value?
//	receive_token?
//	receive_quote?
//	receive_value?
//	network
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('tx_hash');
            $table->string('type');
            $table->string('status');
            $table->string('network');
            $table->dateTime('time');

            $table->string('fee')->nullable();
            $table->double('fee_usd')->nullable();

            $table->string('from')->nullable();
            $table->string('to')->nullable();

            $table->string('wallet_address')->nullable();
            $table->unsignedInteger('block')->nullable();

            $table->string('send_token')->nullable();
            $table->unsignedDouble('send_quote')->nullable();
            $table->unsignedDouble('send_value')->nullable();

            $table->string('receive_token')->nullable();
            $table->unsignedDouble('receive_quote')->nullable();
            $table->unsignedDouble('receive_value')->nullable();

            $table->boolean('verified')->nullable();

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
        Schema::dropIfExists('transactions');
    }
}
