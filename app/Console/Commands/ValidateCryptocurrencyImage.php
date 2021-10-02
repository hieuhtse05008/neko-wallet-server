<?php

namespace App\Console\Commands;

use App\Models\Cryptocurrency;
use App\Models\CryptocurrencyMapping;
use Illuminate\Console\Command;

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

        $cryptocurrencies = Cryptocurrency::orderBy('id')->where('icon_url','like','%coinmarketcap%')->get();

        $total = count($cryptocurrencies);

        foreach ($cryptocurrencies as $key => $cryptocurrency) {

            if (empty($cryptocurrency->icon_url)) continue;
            if (str_contains($cryptocurrency->icon_url, 'cloudfront')) continue;
            try {
                echo "Progress: $key/$total       \r";
                getimagesize($cryptocurrency->icon_url);
                $this->uploadImage($cryptocurrency);

            } catch (\Exception $e) {
                echo PHP_EOL;
                echo 'Change image size ', $cryptocurrency->id, PHP_EOL;
                $cryptocurrency->icon_url = str_replace('200x200', '64x64', $cryptocurrency->icon_url);
                $cryptocurrency->save();
                $this->uploadImage($cryptocurrency, true);
            }
        }
        return 0;
    }

    private function uploadImage(Cryptocurrency $cryptocurrency, $use_default = false)
    {
        try {
            $httpClient = new \GuzzleHttp\Client();
            $image = fopen($cryptocurrency->icon_url, 'r');

            $response = $httpClient->request('POST', "https://colorme.vn/api/v3/upload-image-public", [
                'multipart' => [
                    [
                        'name' => 'image',
                        'contents' => $image,
                    ],
                ]
            ]);

            $data = json_decode($response->getBody()->getContents());
            $cryptocurrency->icon_url = $data->link;
            $cryptocurrency->save();

        } catch (\Exception $e) {
//            dd($e);
            echo 'Failed Upload Image ', $cryptocurrency->id, PHP_EOL;
            if($use_default){
                echo 'USE DEFAULT ',$cryptocurrency->id, PHP_EOL;
                $cryptocurrency->icon_url = 'https://d1j8r0kxyu9tj8.cloudfront.net/files/1632918583FJlG6MQa2h41nBb.jpg';
                $cryptocurrency->save();
            }
        }
    }
}
