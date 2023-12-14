<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
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

        // admin side

        // $basic  = new \Vonage\Client\Credentials\Basic("fe1715cd", "gp17B0IoabKP3nyy");
        // $client = new \Vonage\Client($basic);

        // $response = $client->sms()->send(
        //     new \Vonage\SMS\Message\SMS("639122580523",'WDTS', 'The Collection Time will Be on: ')
        // );

        // $message = $response->current();

        // if ($message->getStatus() == 0) {
        //     // echo "The message was sent successfully\n";
        //     return redirect()->route('schedule')->with('message', 'The message was sent successfully');
        // } else {
        //     echo "The message failed with status: " . $message->getStatus() . "\n";
        // }

        // admin
        $basic  = new \Vonage\Client\Credentials\Basic("59d47bd7", "0bnOjwpUBX1XoujH");
        $client = new \Vonage\Client($basic);

        // Retrieve schedules from the database
        $schedules = Schedule::all();

        // Build the SMS content with schedule information
        $smsContent = 'Collection Schedules:' . PHP_EOL;

        foreach ($schedules as $schedule) {
            $smsContent .= "Start: {$schedule->start}, Time: {$schedule->time}" . PHP_EOL;
        }

        // Send SMS with the built content
        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("639512847808", 'WDTS', $smsContent)
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            return redirect()->route('collector-schedule')->with('message', 'The message was sent successfully');
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }

    // // collector side
    // public function sms_controller() {
    //     $basic  = new \Vonage\Client\Credentials\Basic("fe1715cd", "gp17B0IoabKP3nyy");
    //     $client = new \Vonage\Client($basic);

    //     $response = $client->sms()->send(
    //         new \Vonage\SMS\Message\SMS("639122580523",'WDTS', 'The Collection Time will Be on: ')
    //     );

    //     $message = $response->current();

    //     if ($message->getStatus() == 0) {
    //         // echo "The message was sent successfully\n";
    //         return redirect()->route('collector-schedule')->with('message', 'The message was sent successfully');
    //     } else {
    //         echo "The message failed with status: " . $message->getStatus() . "\n";
    //     }
    // }

    // // collector side
    // public function sms_controller()
    // {
    //     $users = User::where('status', 'active')->get();
    //     $schedules = Schedule::all();

    //     foreach ($users as $user) {
    //         // Modify the SMS content as needed
    //         $smsContent = 'The Collection Time will Be on: ';

    //         // Modify the phone number field based on your User model structure
    //         $phoneNumber = $user->number;

    //         $basic  = new \Vonage\Client\Credentials\Basic("59d47bd7", "0bnOjwpUBX1XoujH");
    //         $client = new \Vonage\Client($basic);

    //         $response = $client->sms()->send(
    //             new \Vonage\SMS\Message\SMS($phoneNumber, 'WDTS', $smsContent)
    //         );

    //         $message = $response->current();

    //         if ($message->getStatus() == 0) {
    //             // SMS sent successfully
    //             // You may want to log this information or handle it as needed
    //             // For example: Log::info("SMS sent to $phoneNumber successfully");
    //         } else {
    //             // SMS failed to send
    //             // You may want to log this information or handle it as needed
    //             // For example: Log::error("SMS to $phoneNumber failed with status: " . $message->getStatus());
    //         }
    //     }

    //     return redirect()->route('collector-schedule')->with('message', 'SMS notifications were sent successfully');
    // }

    // collector button
    public function sms_controller()
    {
        $basic  = new \Vonage\Client\Credentials\Basic("59d47bd7", "0bnOjwpUBX1XoujH");
        $client = new \Vonage\Client($basic);

        // Retrieve schedules from the database
        $schedules = Schedule::all();

        // Build the SMS content with schedule information
        $smsContent = 'Collection Schedules:' . PHP_EOL;

        foreach ($schedules as $schedule) {
            $smsContent .= "Start: {$schedule->start}, Time: {$schedule->time}" . PHP_EOL;
        }

        // Send SMS with the built content
        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("639512847808", 'WDTS', $smsContent)
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            return redirect()->route('collector-schedule')->with('message', 'The message was sent successfully');
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }

}
