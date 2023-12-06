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
        // try {
        //     $apiKey = "fe1715cd";
        //     $apiSecret = "gp17B0IoabKP3nyy";
        //     $basic = new Basic($apiKey, $apiSecret);
        //     $client = new Client($basic);

        //     $users = User::all(['number']);
        //     $title = 'WDTS';
        //     $text = 'The Collection Time will Be on: ';

        //     foreach ($users as $user) {
        //         // Check if $user->number is not null or empty
        //         // if ($user->number) {
        //             try {
        //                 $response = $client->sms()->send(
        //                     new \Vonage\SMS\Message\SMS($user->number, $title, $text)
        //                 );

        //                 $message = $response->current();

        //                 if ($message->getStatus() == 0) {
        //                     echo "The message was sent successfully to {$user->number}\n";
        //                 } else {
        //                     echo "The message to {$user->number} failed with status: " . $message->getStatus() . "\n";
        //                 }
        //             } catch (\Exception $e) {
        //                 echo "Failed to send SMS to {$user->number}. Error: " . $e->getMessage() . "\n";
        //             }
        //         // } else {
        //         //     echo "Skipping user with null or empty number.\n";
        //         // }
        //     }
        // } catch (\Exception $e) {
        //     echo "An error occurred: " . $e->getMessage() . "\n";
        // }

        $basic  = new \Vonage\Client\Credentials\Basic("fe1715cd", "gp17B0IoabKP3nyy");
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("639122580523",'WDTS', 'The Collection Time will Be on: ')
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            // echo "The message was sent successfully\n";
            return redirect()->route('schedule')->with('message', 'The message was sent successfully');
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }

    public function sms_controller() {
        $basic  = new \Vonage\Client\Credentials\Basic("fe1715cd", "gp17B0IoabKP3nyy");
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("639122580523",'WDTS', 'The Collection Time will Be on: ')
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            // echo "The message was sent successfully\n";
            return redirect()->route('collector-schedule')->with('message', 'The message was sent successfully');
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }
}
