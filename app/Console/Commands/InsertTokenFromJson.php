<?php

namespace App\Console\Commands;

use App\Models\Cryptocurrency;
use App\Models\CryptocurrencyCategory;
use App\Models\CryptocurrencyMapping;
use App\Models\Network;
use App\Models\Token;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class InsertTokenFromJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'json:insert_tokens';

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
        $json_str = file_get_contents("token-02-10-21.json");

        $tokens = json_decode($json_str);

        foreach ($tokens as $token) {
            $data = get_object_vars($token);
            $crypto = Cryptocurrency::find($data['cryptocurrency_id']);
            $network = Network::find($data['network_id']);
            if($crypto && $network)
                Token::updateOrCreate([
                    'cryptocurrency_id'=>$data['cryptocurrency_id'],
                    'network_id'=>$data['network_id'],
                ], [
                    'name'=>$data['name'],
                    'symbol'=>$data['symbol'],
                    'icon_url'=>$data['icon_url'],
                    'verified'=>$data['verified'],
                    'address'=>$data['address'],
                    'active_wallet'=>$data['active_wallet'],
                    'decimals'=>$data['decimals'],
                ]);

        }
        return 0;
    }
}
