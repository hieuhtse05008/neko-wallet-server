<?php


namespace App\Services;


class TelegramService
{
    private const API_DOMAIN = 'https://api.telegram.org';
    private const BOT_ID = 'bot1811979499:AAFONyW26hIRGhndGLmERDuaLz-9MkKImzs';

    private static function getQueryUrl($suffix)
    {
        return self::API_DOMAIN.'/'.self::BOT_ID.'/'.$suffix;
    }

    public static function sendMessageToChat($chat_id, $message, $parse_mode='html')
    {

        if (empty($chat_id)) return null;
        $httpClient = new \GuzzleHttp\Client();

        $url = self::getQueryUrl('sendMessage?text='.$message.'&chat_id='.$chat_id.'&parse_mode='.$parse_mode.'&disable_web_page_preview=true');

        $response = $httpClient->post($url);
//        $url = 'https://api.telegram.org/bot1811979499:AAFONyW26hIRGhndGLmERDuaLz-9MkKImzs/getMe';
//        $response = $httpClient->get($url);
        $res =
//            json_decode
            ($response->getBody()->getContents());


        return ($res);
    }
}
