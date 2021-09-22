<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Cryptocurrency;
use Illuminate\Console\Command;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:sitemap';

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
        $categories = Category::all();
        $cryptocurrencies = Cryptocurrency::all();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>
                    <urlset
                          xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
                          xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                          xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
                                http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
                    ';

        foreach ($cryptocurrencies as $cryptocurrency){
            $name = urlencode($cryptocurrency->name);
            $xml .= "
                <url>
                  <loc>https://nekowallet.io/cryptocurrency/$name</loc>
                  <lastmod>2021-09-22T11:05:32+00:00</lastmod>
                  <priority>1</priority>
                </url>
            ";
        }
        foreach ($categories as $category){
            $xml .= "
                <url>
                  <loc>https://nekowallet.io/cryptocurrencies?category_id={$category->id}</loc>
                  <lastmod>2021-09-22T11:05:32+00:00</lastmod>
                  <priority>1</priority>
                </url>
            ";
        }


        $xml.='</urlset>';
        $f = fopen("public/sitemap.xml", "w") or die("Unable to open file!");
        $txt = $xml;
        fwrite($f, $txt);
        fclose($f);
        return 0;
    }
}
