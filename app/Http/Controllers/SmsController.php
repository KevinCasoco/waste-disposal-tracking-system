<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Vonage\Client\Credentials\Basic;
use Vonage\Client;

class SmsController extends Controller
{
    // admin button
    public function sms()
    {
        // vonage sms api credentials
        $basic  = new \Vonage\Client\Credentials\Basic("80cd2c81", "OdKVwJeopoTsQM4V");
        $client = new \Vonage\Client($basic);

        // Retrieve schedules from the database
        $schedules = Schedule::all();

        // Build the SMS content with schedule information
        $smsContent = 'Waste Collection Schedules:' . PHP_EOL;

        foreach ($schedules as $schedule) {
            $smsContent .= "Admin ID: {$schedule->users_id},\n Location: {$schedule->location},\n Date: {$schedule->start},\n Time: {$schedule->time}" . PHP_EOL;
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
        $basic  = new \Vonage\Client\Credentials\Basic("80cd2c81", "OdKVwJeopoTsQM4V");
        $client = new \Vonage\Client($basic);

        // Retrieve schedules from the database
        $schedules = Schedule::all();

        // Build the SMS content with schedule information
        $smsContent = 'Waste Collection Schedules:' . PHP_EOL;

        foreach ($schedules as $schedule) {
            $smsContent .= "Collector ID: {$schedule->users_id},\n Location: {$schedule->location},\n Date: {$schedule->start},\n Time: {$schedule->time}" . PHP_EOL;
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
