<?php


namespace App\Enum;


final class Coin
{
    const MARKET_CAPS = [
        ["key" => "nano_caps",  "high" => 10000,],
        ["key" => "micro_caps", "low" => 100000, "high" => 1000000,],
        ["key" => "small_caps", "low" => 1000000, "high" => 1000000,],
        ["key" => "mid_caps", "low" => 10000000, "high" => 100000000,],
        ["key" => "large_caps", "low" => 100000000, "high" => 1000000000,],
        ["key" => "mega_caps", "low" => 1000000000, ],
    ];
}
