<?php

namespace App\Console\Commands;

use App\Models\Cryptocurrency;
use Illuminate\Console\Command;

class UpdateTokenImageByCryptocurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:token_image_by_cryptocurrency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $cryptocurrencies = Cryptocurrency::all();
//        $cryptocurrencies = Cryptocurrency::where('id','=',11311)->get();
        foreach ($cryptocurrencies as $key=>$cryptocurrency){
            echo "Progress: ",$key+1,"/",count($cryptocurrencies)," \r";
            $cryptocurrency->tokens()->update(['icon_url'=>$cryptocurrency->icon_url]);
        }
        return 0;
    }
}
