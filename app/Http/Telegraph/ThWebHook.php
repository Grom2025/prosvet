<?php

namespace App\Http\Telegraph;

use DefStudio\Telegraph\Handlers\WebhookHandler;

class ThWebHook extends WebhookHandler
{
 public function start()
 {
    $this->chat->html("<b>Hello!</b>\n\n user")->send();
    //$this->chat->
 }
}
