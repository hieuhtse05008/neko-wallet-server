<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class GetCoinMarketCapJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get_json:cmc';

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

    private $path = 'resources/json/cmc';



    private function handleCoins(){
//        $this->handleCoin(11156);return;

        for ($i = 1; $i <= 12000; $i++) {
//         foreach([] as $i){
            $data = $this->handleCoin($i);
            if(!empty($data)) $this->saveFile($i, $data);
//            sleep(2);
        }
    }


    private function handleCoin($id){
        try {
            //get slug
            $httpClient = new \GuzzleHttp\Client();
            $url = "https://api.coinmarketcap.com/data-api/v3/cryptocurrency/detail?id=$id";
            $response = $httpClient->get($url);
            $api_data = json_decode($response->getBody()->getContents())->data;

            if (!property_exists($api_data, 'slug')) {
                Log::info("EMPTY $id handleCoinMarketCap");
                echo "EMPTY $id", PHP_EOL;
                return null;
            }else{
                echo $id, PHP_EOL;
            }
            //get info
            $context = stream_context_create(
                array(
                    "http" => array(
                        "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
                    )
                )
            );
            $content = (file_get_contents("https://coinmarketcap.com/currencies/{$api_data->slug}", false, $context));
            preg_match("/<script id=\"__NEXT_DATA__\" type=\"application\/json\">(.*)<\/script>/", $content, $json, PREG_OFFSET_CAPTURE);
            $text = (($json[0])[0]);
            $dom = new \DOMDocument();
            $dom->preserveWhiteSpace = false;
            $dom->loadHTML($text, LIBXML_HTML_NOIMPLIED);
            $dom->formatOutput = true;
            $json_text = ($dom->textContent);

            $obj = json_decode($json_text);
            $web_data = object_get($obj, 'props.initialProps.pageProps.info');

            return  (object) array_merge((array) $web_data, (array) $api_data);
        }catch (\Exception $e){
            echo "FAIL $id ", $e, PHP_EOL;
            Log::info("FAIL CMC $id ");
//            Log::info($e);
        }
    }

    private function saveFile($id,$data){
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
