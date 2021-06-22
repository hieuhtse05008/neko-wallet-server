<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwapTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('tokens','token_prices');
        Schema::create('dexes', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->string('name');
            $table->string('icon_url');

            $table->timestamps();
        });

        Schema::create('networks', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->string('name');
            $table->string('short_name')->nullable();
            $table->string('icon_url')->nullable();
            $table->string('chain_id');
            $table->string('symbol');
            $table->string('rpc_url');
            $table->string('explorer_url');
            $table->string('wallet_derive_path');
            $table->timestamps();
        });
        Schema::create('contracts', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->foreignUuid('network_id')->constrained('networks');
            $table->string('name');
            $table->string('symbol');
            $table->string('icon_url');
            $table->integer('decimal');
            $table->string('address');
            $table->timestamps();

        });
        Schema::create('swaps', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->string('type')->nullable();
//            $table->string('network_speed')->default('');

            $table->foreignUuid('from_contract_id')->constrained('contracts');

            $table->string('from_address')->default('');
            $table->string('from_amount')->default('0');
            $table->string('from_price')->default('');
            $table->string('from_gas_price')->default('');
            $table->string('from_gas_limit')->default('');

            $table->foreignUuid('to_contract_id')->constrained('contracts');

            $table->string('to_address')->default('');
            $table->string('to_amount')->default('0');
            $table->string('to_price')->default('');
            $table->string('to_gas_price')->default('');
            $table->string('to_gas_limit')->default('');

            $table->timestamps();
        });
        Schema::create('swap_transactions', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->foreignUuid('contract_id')->constrained('contracts');
            $table->string('tx');
            $table->string('from');
            $table->string('to');
            $table->string('status');
            $table->string('amount')->default('0');
            $table->string('block_number')->nullable();
            $table->string('chain_id')->nullable();
            $table->bigInteger('gas_limit')->nullable();
            $table->bigInteger('gas_price')->nullable();
            $table->bigInteger('gas_used')->nullable();

            $table->timestamps();

        });
        Schema::create('dex_order_requests', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();

            $table->string('status');
            $table->foreignUuid('contract_id')->constrained('contracts');
            $table->string('amount')->default('0');
            $table->timestamps();

        });
        Schema::create('dex_transactions', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->foreignUuid('dex_order_request_id')->constrained('dex_order_requests');
            $table->foreignUuid('dex_id')->constrained('dexes');
            $table->foreignUuid('contract_id')->constrained('contracts');
            $table->string('dex_order_id');

            $table->integer('percent')->default(0);
            $table->string('status')->default('');
            $table->string('price')->default('0');
            $table->string('amount')->default('0');
            $table->timestamps();

        });


        Schema::create('swap_orders', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->string('status')->default('');
            $table->foreignUuid('swap_id')->constrained('swaps');
            $table->string('fee')->default('0');
            $table->string('current_step')->default('');

            $table->foreignUuid('from_swap_transaction_id')->constrained('swap_transactions');
            $table->foreignUuid('from_dex_order_request_id')->constrained('dex_order_requests');
            $table->foreignUuid('to_swap_transaction_id')->constrained('swap_transactions');
            $table->foreignUuid('to_dex_order_request_id')->constrained('dex_order_requests');

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

    }
}
