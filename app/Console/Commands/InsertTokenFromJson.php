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
//        $json_str = file_get_contents("token-02-10-21.json");
//        $json_str = file_get_contents("tokens-15-11-21.json");
        //$json_str = file_get_contents("tokens-16-11-21.json");
        $json_str = file_get_contents("tokens-4.json");
        $tokens = json_decode($json_str);

        foreach ($tokens as $token) {

            $crypto = Cryptocurrency::find(object_get($token,'cryptocurrency_id'));
            $network = Network::find(object_get($token,'network_id'));
            if($crypto && $network)
                Token::updateOrCreate([
                    'cryptocurrency_id'=>object_get($token,'cryptocurrency_id'),
                    'network_id'=>object_get($token,'network_id'),
                ], [
                    'name'=>object_get($token,'name'),
                    'symbol'=>object_get($token,'symbol'),
                    'icon_url'=>object_get($token,'icon_url'),
                    'verified'=>object_get($token,'verified'),
                    'address'=>object_get($token,'address'),
                    'active_wallet'=>object_get($token,'active_wallet'),
                    'decimals'=>object_get($token,'decimals') ?? 0,
                    'swappable'=>object_get($token,'swappable') ?? false,
                ]);

        }
        return 0;
    }
}
