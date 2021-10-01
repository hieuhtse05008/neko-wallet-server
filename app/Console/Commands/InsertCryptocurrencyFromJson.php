<?php

namespace App\Console\Commands;

use App\Models\Cryptocurrency;
use App\Models\CryptocurrencyMapping;
use Illuminate\Console\Command;

class InsertCryptocurrencyFromJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'json:insert_cryptocurrencies';

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

    private $path = 'resources/json';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $json_str = file_get_contents("cryptocurrencies2.json");
        $cryptocurrencies = json_decode($json_str);
        foreach ($cryptocurrencies as $cryptocurrency) {
            $data = get_object_vars($cryptocurrency);
            $obj = Cryptocurrency::find($data['id']);
            if(!empty($obj)) continue;
            Cryptocurrency::insertOrIgnore([
                "id" => $data['id'],
                "name" => $data['name'],
                "symbol" => $data['symbol'],
                "slug" => $data['slug'],
                "icon_url" => $data['icon_url'],
                "rank" => $data['rank'],
                "verified" => $data['verified'],
            ]);
            $obj = CryptocurrencyMapping::where('cmd_id','=',$data['id'])->first();
            if(!empty($obj)) continue;
            CryptocurrencyMapping::insertOrIgnore([
                'cryptocurrency_id'=>$data['id'],
                'cmc_id'=>$data['cmc_id'],
            ]);
        }
        return 0;
    }
}
