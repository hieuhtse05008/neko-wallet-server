<?php

namespace App\Console\Commands;

use App\Models\Cryptocurrency;
use App\Models\CryptocurrencyMapping;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ValidateCryptocurrencyImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'validate:cryptocurrency_image';

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
//        dd(getimagesize('https://s2.coinmarketcap.com/static/img/coins/200x200/74.png'));
//        $cryptocurrency = Cryptocurrency::find(7);
//        $this->uploadImage($cryptocurrency);
//        return 0;
//        dd(str_replace('200x200','64x64','https://s2.coinmarketcap.com/static/img/coins/200x200/6958.png'));
        $cryptocurrencies = Cryptocurrency::orderBy('id')->get();
        $total = count($cryptocurrencies);
        $faileds = [];
        foreach ($cryptocurrencies as $key => $cryptocurrency) {

            if (empty($cryptocurrency->icon_url)) continue;
            if (str_contains($cryptocurrency->icon_url, 'cloudfront')) continue;
            try {
                echo "Progress: $key/$total       \r";
                getimagesize($cryptocurrency->icon_url);
                $this->uploadImage($cryptocurrency);

            } catch (\Exception $e) {
                Log::info($cryptocurrency->id);
                Log::error($e);
                $faileds[] = $cryptocurrency;
                echo PHP_EOL;
                echo $cryptocurrency->id, PHP_EOL;
                $cryptocurrency->icon_url = str_replace('200x200', '64x64', $cryptocurrency->icon_url);
                $cryptocurrency->save();
                try {
                    $this->uploadImage($cryptocurrency);
                }catch (\Exception $e2){
                    echo 'USE DEFAULT ',$cryptocurrency->id, PHP_EOL;
                    $cryptocurrency->icon_url = 'http://d1j8r0kxyu9tj8.cloudfront.net/files/1632918583FJlG6MQa2h41nBb.jpg';
                    $cryptocurrency->save();

                }

            }
//            usleep(900000);
        }
        echo "FAILED: ", count($faileds), PHP_EOL;
        return 0;
    }

    private function uploadImage(Cryptocurrency $cryptocurrency)
    {
        try {
            $httpClient = new \GuzzleHttp\Client();
//            $filename = $cryptocurrency->id . "png";
//            $image = file_get_contents($cryptocurrency->icon_url);
            $image = fopen($cryptocurrency->icon_url, 'r');

            $response = $httpClient->request('POST', "https://colorme.vn/api/v3/upload-image-public", [
                'multipart' => [
                    [
                        'name' => 'image',
//                        'contents' => \GuzzleHttp\Psr7\Utils::tryFopen($cryptocurrency->icon_url, 'r'),
                        'contents' => $image,
                    ],
                ]
            ]);
            $data = json_decode($response->getBody()->getContents());
//            dd($cryptocurrency, $data);
            $cryptocurrency->icon_url = $data->link;
            $cryptocurrency->save();
        } catch (\Exception $e) {
//            dd($e);
            echo 'Not found', PHP_EOL;
//            echo \GuzzleHttp\Psr7\Message::toString($e->getRequest());
//            echo \GuzzleHttp\Psr7\Message::toString($e->getResponse());
        }
    }
}
