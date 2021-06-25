<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    protected $toTruncate = [];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(FakerDataSeeder::class);
    }
}
