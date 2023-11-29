<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Vonage\Client\Credentials\Basic;
use Vonage\Client;

class SmsController extends Controller
{
    public function sms()
    {
        try {
            $basic  = new \Vonage\Client\Credentials\Basic("444e63ad", "rF2sxIBvttwnsLSL");
            $client = new \Vonage\Client($basic);

            $users = User::all(['number']);
            $title = 'WDTS';
            $text = 'The Collection Time will Be on:';

            foreach ($users as $user) {
                $response = $client->sms()->send(
                    new \Vonage\SMS\Message\SMS($user->number, $title, $text)
                );

                $message = $response->current();

                if ($message->getStatus() == 0) {
                    echo "The message was sent successfully to {$user->number}\n";
                } else {
                    echo "The message to {$user->number} failed with status: " . $message->getStatus() . "\n";
                }
            }
        } catch (\Exception $e) {
            echo "An error occurred: " . $e->getMessage() . "\n";
        }
    }
}
