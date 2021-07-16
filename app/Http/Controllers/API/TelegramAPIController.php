<?php


namespace App\Http\Controllers\API;


use App\Services\TelegramService;
use Illuminate\Support\Facades\DB;

class TelegramAPIController extends APIController
{


    public function index(){


        $res = TelegramService::sendMessageToChat('-535769292', "<b>bold</b>, <strong>bold</strong>
<i>italic</i>,\n <em>italic</em>
<u>underline</u>,<ins>underline</ins>
<s>strikethrough</s>,<strike>strikethrough</strike>,
<del>strikethrough</del>
<b>bold <i>italic bold <s>italic bold strikethrough</s> <u>underline italic bold</u></i> bold</b>
<a href=\"http://www.example.com/\">inline URL</a>
<a href=\"tg://user?id=123456789\">inline mention of a user</a>
<code>inline fixed-width code</code>
<pre>pre-formatted fixed-width code block</pre>
<pre><code class=\"language-python\">pre-formatted fixed-width code block written in the Python programming language</code></pre>");
        return ($res);
    }
}
