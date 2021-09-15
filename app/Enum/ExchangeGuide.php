<?php


namespace App\Enum;


final class ExchangeGuide
{
    const GUIDES = [
        'gate_io'=>[
            'steps' => [
                [
                    'text' => ' Register/Login to your Gate.io account. You should KYC before depositing your fund and purchasing any token.',
                    'image_url' => '',
                ],
                [
                    'text' => 'Go to Trade -> Spot Trading -> Select Standard interface or Professional.',
                    'image_url' => 'http://d1j8r0kxyu9tj8.cloudfront.net/files/1631710345POZql4jcoq7XaBZ.jpg',
                ],
                [
                    'text' => 'Search [TOKEN] in the search bar to go to the available pairs',
                    'image_url' => 'http://d1j8r0kxyu9tj8.cloudfront.net/files/1631710353yBDuNunojSbB0Sy.jpg',
                ],
                [
                    'text' => 'Select one of the order types (Limit Order, Grid Trading, or Tiem Condition) and fill in your order information. The click Buy.',
                    'image_url' => 'http://d1j8r0kxyu9tj8.cloudfront.net/files/16317103649Rq4cIHtWnYfial.jpg',
                ],
                [
                    'text' => 'You can find your current orders in My Orders. Wait for your order to fill. Successfully filled orders can be found in My Trades',
                    'image_url' => 'http://d1j8r0kxyu9tj8.cloudfront.net/files/1631710387y2sty5nir5wpyP6.jpg',
                ],
                [
                    'text' => 'You have successfully purchased CHESS. You can find your CHESS holding in  Wallet -> Funds Overview -> Spot Accounts',
                    'image_url' => 'http://d1j8r0kxyu9tj8.cloudfront.net/files/1631710394fcouTC8NCE30KJZ.jpg',
                ],
            ],
        ],
        'pancake'=>[
            'steps' => [
                [
                    'text' => 'Connect your wallet to Pancakeswap, make sure you have connected on Binance Smart Chain network. In this guide, TrustWallet is used. Go to DApps Browsers and Select Pancakeswap',
                    'image_url' => 'http://d1j8r0kxyu9tj8.cloudfront.net/files/1631707735At8HM8itnBM7IN8.png',
                ],
                [
                    'text' => 'Select/Import your base token. Enable your base token if prompted.',
                    'image_url' => 'http://d1j8r0kxyu9tj8.cloudfront.net/files/1631708909ArhcODmfSJvgVKH.png',
                ],
                [
                    'text' => 'Find your target token or add a custom token using the BEP20 contract address of that token.',
                    'image_url' => 'http://d1j8r0kxyu9tj8.cloudfront.net/files/1631709176PHRKPktMW8SThYw.png',
                ],
                [
                    'text' => 'After checking slippage and price impact. Click swap to execute your order.A confirmation message to execute the smart contract call will pop up. Click Approve to proceed.',
                    'image_url' => 'http://d1j8r0kxyu9tj8.cloudfront.net/files/1631709285MEbfLR6U4QuVsYb.png',
                ],
                [
                    'text' => 'After the order has been executed, wait a few seconds for the success message to pop-up. Congratulations, you have successfully buy [$TOKEN] on Pancakeswap. Exit Pancakeswap and check your token balance in your wallet.',
                    'image_url' => 'http://d1j8r0kxyu9tj8.cloudfront.net/files/16317093445ot09uwSHCpEuOP.png',
                ],
            ]
        ],
    ];
}
