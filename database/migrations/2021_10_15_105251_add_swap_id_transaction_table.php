<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSwapIdTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("create table swap_orders
(
    updated_at    timestamp with time zone not null,
    created_at    timestamp with time zone not null,
    is_used       boolean default false,
    expired_at    timestamp with time zone,
    network_id    integer
        constraint swap_orders_network_id_fkey
            references networks,
    src_decimals  integer,
    dest_decimals integer,
    dest_usd      varchar(255),
    src_usd       varchar(255),
    dest_amount   varchar(255),
    src_amount    varchar(255),
    dest_token    varchar(255),
    src_token     varchar(255),
    data          jsonb,
    id            uuid                     not null
        constraint swap_orders_pkey
            primary key,
    gas_cost_usd  varchar(255),
    gas_cost      varchar(255)
);
");

        Schema::table('transactions', function (Blueprint $table) {
            $table->foreignUuid('swap_order_id')->nullable()->references('id')->on('swap_orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            //
        });
    }
}
