<?php

namespace App\Console\Commands;

use App\Models\Coin;
use App\Models\CoinMarketsData;
use App\Services\TelegramService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class AlertCoinSignals extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'alert:signals';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync markets of coins';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    private function checkSignal(Coin $coin, $stamp)
    {
        $market = $coin->markets()
//            ->where(function ($q){
//                return $q->where('market_cap','<', 10000)->orWhere(function ($q2){
//                   return
//                });
//            })

            ->where('market_cap','<', 100000000)
            ->where('created_at', '>=', $stamp->subMinutes(30))
            ->orderBy('created_at', 'desc')
            ->first();

        if ($market == null) return;
        $now = Carbon::parse($market->created_at);
        $should_send_message = false;
        $symbol = strtoupper($coin->symbol);
        $name = ($coin->name);
        $percent_1h = number_format((float)$market->price_change_percentage_1h_in_currency, 2, '.', '');
        $percent_24h = number_format((float)$market->price_change_percentage_24h, 2, '.', '');

        $message = "<a>Symbol: $symbol</a>\n<a>Name: $name</a>\n";

        if ($percent_1h > 15) {
            $should_send_message = true;
            $message = $message . "<a>Price change 1h: $percent_1h(%)</a>\n";
        }
        if ($percent_24h > 100) {
            $should_send_message = true;
            $message = $message . "<a>Price change 24h: $percent_24h(%)</a>\n";
        }

        $last_market_1h = CoinMarketsData::where('coin_id', '=', $coin->coin_id)
            ->whereBetween('created_at', [$now->subHour()->subMinutes(5), $now->subHour()->addMinutes(5),])
            ->orderBy('created_at', 'desc')
            ->first();
        if ($last_market_1h && $last_market_1h->total_volume) {
            Log::info($last_market_1h->created_at);
            $volume_change_percentage = ($market->total_volume / $last_market_1h->total_volume - 1) * 100;
            $volume_change_percentage = number_format($volume_change_percentage, 2, '.', '');
            if ($volume_change_percentage > 50) {

                $should_send_message = true;
                $message = $message . "<a>Volume change 1h: $volume_change_percentage(%)</a>\n";
            }
        }
        $last_market_24h = CoinMarketsData::where('coin_id', '=', $market->id)
            ->whereBetween('created_at', [$now->subDay()->subMinutes(5), $now->subDay()->addMinutes(5),])
            ->orderBy('created_at', 'desc')
            ->first();
        if ($last_market_24h && $last_market_24h->total_volume) {
            Log::info($last_market_24h->created_at);
            $volume_change_percentage = ($market->total_volume / $last_market_24h->total_volume - 1) * 100;
            $volume_change_percentage = number_format($volume_change_percentage, 2, '.', '');
            if ($volume_change_percentage > 100) {

                $should_send_message = true;
                $message = $message . "<a>Volume change 24h: $volume_change_percentage(%)</a>\n";
            }
        }
        if ($should_send_message) {
            Log::info("$message");
            Log::info($market->created_at);
            TelegramService::sendMessageToChat('-1001334835359', $message);

        }

    }

    private function checkSignals()
    {
        $coins = Coin::all();
        $stamp = now();
        foreach ($coins as $coin) {
            $this->checkSignal($coin, $stamp);
        }
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info('start AlertSignals');
        $this->checkSignals();
        Log::info('end AlertSignals');
        return 0;
    }
}
