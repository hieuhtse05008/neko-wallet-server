<?php


namespace App\Enum;


final class CoinMarketsData
{
    const DOUBLE_FIELDS = [
        "current_price" => "(CASE WHEN current_price = '' then null else current_price end)::DOUBLE PRECISION",
        "market_cap" => "(CASE WHEN market_cap = '' then null else market_cap end)::DOUBLE PRECISION",
        "total_volume" => "(CASE WHEN total_volume = '' then null else total_volume end)::DOUBLE PRECISION",
        "price_change_24h" => "(CASE WHEN price_change_24h = '' then null else price_change_24h end)::DOUBLE PRECISION",
        "price_change_percentage_24h" => "(CASE WHEN price_change_percentage_24h = '' then null else price_change_percentage_24h end)::DOUBLE PRECISION",
        "circulating_supply" => "(CASE WHEN circulating_supply = '' then null else circulating_supply end)::DOUBLE PRECISION",
        "total_supply" => "(CASE WHEN total_supply = '' then null else total_supply end)::DOUBLE PRECISION",
        "max_supply" => "(CASE WHEN max_supply = '' then null else max_supply end)::DOUBLE PRECISION",
        "market_cap_rank" => "(CASE WHEN market_cap_rank = '' then null else market_cap_rank end)::DOUBLE PRECISION",
        "fully_diluted_valuation" => "(CASE WHEN fully_diluted_valuation = '' then null else fully_diluted_valuation end)::DOUBLE PRECISION",
        "high_24h" => "(CASE WHEN high_24h = '' then null else high_24h end)::DOUBLE PRECISION",
        "ath" => "(CASE WHEN ath = '' then null else ath end)::DOUBLE PRECISION",
        "ath_change_percentage" => "(CASE WHEN ath_change_percentage = '' then null else ath_change_percentage end)::DOUBLE PRECISION",
        "low_24h" => "(CASE WHEN low_24h = '' then null else low_24h end)::DOUBLE PRECISION",
        "atl" => "(CASE WHEN atl = '' then null else atl end)::DOUBLE PRECISION",
        "atl_change_percentage" => "(CASE WHEN atl_change_percentage = '' then null else atl_change_percentage end)::DOUBLE PRECISION",

    ];
}
