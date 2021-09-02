<?php

namespace App\Console\Commands;

use App\Connector\DatabaseConnector;
use App\Connector\MerchantConnector;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

/**
 * Class CodeAPIGenerate
 * @package App\Console\Commands
 */
class CodeAPIGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'code:api-generate
                            {name : Name of table}
                            {--tableName= : Name of table to get info}
                            {--plural : plural of table to get info}
                            {--dbName= : Name of database to connect}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto generate code with object table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $name = $this->argument('name');

//        if ($this->option('dbName')) {
//
//            config(['database.connections.pgsql.database' => $this->option('dbName')]);
//            DB::purge('pgsql');
//            DB::reconnect('pgsql');
//        }

        $this->call('make:transformer', [
            'name' => $name,
            "--force" => true,
        ]);

        $this->call('make:presenter', [
            'name' => $name,
            "--force" => true,
        ]);

        $this->call('make:repository', [
            'name' => $name,
            "--force" => true,
            "--skip-model" => true,
            "--skip-migration" => true,
        ]);

        if ($this->option('tableName')) {
            $this->call('infyom:api', [
                'model' => $name,
                '--fromTable' => true,
                "--tableName" => $this->option('tableName')
            ]);

        } else {
            $this->call('infyom:api', [
                'model' => $name,
                "--plural" => $this->option('plural') ?? null,
            ]);
        }

        $this->call('make:bindings', [
            'name' => $name,
        ]);


    }

}
