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
        // admin
        $basic  = new \Vonage\Client\Credentials\Basic("a01afc5e", "H8YYkyhcaqXnRYf7");
        $client = new \Vonage\Client($basic);

        // Retrieve schedules from the database
        $schedules = Schedule::all();

        // Build the SMS content with schedule information
        $smsContent = 'Collection Schedules:' . PHP_EOL;

        foreach ($schedules as $schedule) {
            $smsContent .= "Admin ID: {$schedule->users_id}, Location: {$schedule->title}, Date: {$schedule->start}, Time: {$schedule->time}" . PHP_EOL;
        }

        // Send SMS with the built content
        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("639704881156", 'WDTS', $smsContent)
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            return redirect()->route('schedule')->with('message', 'The message was sent successfully');
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }

    // collector button
    public function sms_controller()
    {
        $basic  = new \Vonage\Client\Credentials\Basic("a01afc5e", "H8YYkyhcaqXnRYf7");
        $client = new \Vonage\Client($basic);

        // Retrieve schedules from the database
        $schedules = Schedule::all();

        // Build the SMS content with schedule information
        $smsContent = 'Collection Schedules:' . PHP_EOL;

        foreach ($schedules as $schedule) {
            $smsContent .= "Date: {$schedule->start}, Time: {$schedule->time}" . PHP_EOL;
        }

        // Send SMS with the built content
        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("639704881156", 'WDTS', $smsContent)
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            return redirect()->route('collector-schedule')->with('message', 'The message was sent successfully');
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }

}
