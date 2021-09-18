<?php

namespace App\Console\Commands;

use App\Services\CoinGeckoService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class GetCoingeckoJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get_json:coingecko';

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

    private $path = 'resources/json/coingecko';


    private function handleCoins()
    {
//        $coins = CoinGeckoService::getListCoins();
        $coins = [
          ['id'=>'wenburn'],
          ['id'=>'hotbit-token'],
          ['id'=>'king-cardano'],
          ['id'=>'monavale'],
          ['id'=>'meter-governance-mapped-by-meter-io'],
          ['id'=>'nerva'],
          ['id'=>'ninjaswap'],
          ['id'=>'papa-doge'],
          ['id'=>'rope-token'],
          ['id'=>'soft-yearn'],
        ];
        foreach ($coins as $key=>$coin) {
            try {
                echo $key. " - " . $coin['id'], PHP_EOL;
                $data = CoinGeckoService::getCoinById($coin['id'], [
                    'localization'=>'true',
                    'tickers'=>'true',
                    'market_data'=>'true',
                    'community_data'=>'true',
                    'developer_data'=>'true',
                    'sparkline'=>'true'
                ]);
                $this->saveFile($coin['id'], $data);
                sleep(2);
            }catch (\Exception $e){
                echo "FAIL COINGECKO " .  $coin['id'] . " - ", $e, PHP_EOL;
                Log::info("FAIL COINGECKO " .  $coin['id'] . " - ");
            }
        }
    }

    private function saveFile($id, $data)
    {
        $f = fopen("{$this->path}/$id.json", "w") or die("Unable to open file!");
        $txt = json_encode($data);
        fwrite($f, $txt);
        fclose($f);
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->handleCoins();

        return 0;
    }
}
