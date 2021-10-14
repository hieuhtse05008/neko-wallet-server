<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultiLanguageBlogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::statement("delete from blogs where id > 0;");
        DB::statement("alter table blogs alter column slug type jsonb using slug::jsonb;");
        DB::statement("alter table blogs alter column title type jsonb using title::jsonb;");
        DB::statement("alter table blogs alter column description drop default;");
        DB::statement("alter table blogs alter column description type jsonb using description::jsonb;");
        DB::statement("alter table blogs alter column content type jsonb using content::jsonb;");

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
