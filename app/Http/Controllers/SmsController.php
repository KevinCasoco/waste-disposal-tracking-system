<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vonage\Client\Credentials\Basic;
use Vonage\Client;

class SmsController extends Controller
{
    public function sms () {
        $basic  = new \Vonage\Client\Credentials\Basic("f56fa902", "H12PMQd6QsDgH521");
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("639094191380", 'WDTS', 'The Collection Time will Be on:')
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }

}
