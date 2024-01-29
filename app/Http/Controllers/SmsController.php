<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Vonage\Client\Credentials\Basic;
use Vonage\Client;

class SmsController extends Controller
{
    // admin button
    public function sms()
    {
        // vonage sms api credentials
        $basic  = new \Vonage\Client\Credentials\Basic("59e7dbad", "2kKXDNaClVCz33u2");
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
            new \Vonage\SMS\Message\SMS("639307296980", 'WDTS', $smsContent)
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            return redirect()->route('schedule')->with('message', 'The message was sent successfully');
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }

    // // with 1 day before the exact date before sending to sms
    // // residents matches the location to dropdown
    // public function sms()
    // {
    //     // Get the current date
    //     $currentDate = Carbon::now();

    //     // Get all active users
    //     $users = User::where('status', 'active')->get();

    //     // Initialize Vonage SMS API credentials
    //     $basic  = new \Vonage\Client\Credentials\Basic("80cd2c81", "OdKVwJeopoTsQM4V");
    //     $client = new \Vonage\Client($basic);

    //     foreach ($users as $user) {
    //         // Get the user's location (assuming the address contains location information)
    //         $userLocation = $user->location; // Update this line based on your actual structure

    //         // Access schedules with the same location and scheduled date one day before the current date
    //         $schedules = Schedule::whereDate('start', $currentDate->copy()->addDay()->toDateString())
    //                             ->where('location', $userLocation)
    //                             ->get();

    //         if ($schedules->isNotEmpty()) {
    //             // Build the SMS content with schedule information
    //             $smsContent = 'Waste Collection Schedule for ' . $userLocation . ' on ' . $currentDate->copy()->addDay()->toDateString() . ':' . PHP_EOL;

    //             foreach ($schedules as $schedule) {
    //                 $smsContent .= "Location: {$schedule->location},\n Date: {$schedule->start},\n Time: {$schedule->time}" . PHP_EOL;
    //             }

    //             // Send SMS with the built content to the user's phone number (assuming it's stored in the user model)
    //             $response = $client->sms()->send(
    //                 new \Vonage\SMS\Message\SMS($user->phone_number, 'WDTS', $smsContent)
    //             );

    //             $message = $response->current();

    //             if ($message->getStatus() == 0) {
    //                 // SMS sent successfully
    //                 // You may want to log or store the success information
    //             } else {
    //                 // SMS sending failed
    //                 echo "The message failed with status: " . $message->getStatus() . "\n";
    //                 // You may want to handle the failure accordingly
    //             }
    //         }
    //     }

    //     return redirect()->route('schedule')->with('message', 'SMS notifications were sent successfully');
    // }

    // collector button
    public function sms_controller()
    {
        // vonage sms api credentials
        $basic  = new \Vonage\Client\Credentials\Basic("59e7dbad", "2kKXDNaClVCz33u2");
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
            new \Vonage\SMS\Message\SMS("639307296980", 'WDTS', $smsContent)
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            return redirect()->route('collector-schedule')->with('message', 'The message was sent successfully');
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }

    // // with 1 day before the exact date before sending to sms
    // // residents matches the location to dropdown
    // public function sms_controller()
    // {
    //     // Get the current date
    //     $currentDate = Carbon::now();

    //     // Get all active users
    //     $users = User::where('status', 'active')->get();

    //     // Initialize Vonage SMS API credentials
    //     $basic  = new \Vonage\Client\Credentials\Basic("80cd2c81", "OdKVwJeopoTsQM4V");
    //     $client = new \Vonage\Client($basic);

    //     foreach ($users as $user) {
    //         // Get the user's location (assuming the address contains location information)
    //         $userLocation = $user->location; // Update this line based on your actual structure

    //         // Access schedules with the same location and scheduled date one day before the current date
    //         $schedules = Schedule::whereDate('start', $currentDate->copy()->addDay()->toDateString())
    //                             ->where('location', $userLocation)
    //                             ->get();

    //         if ($schedules->isNotEmpty()) {
    //             // Build the SMS content with schedule information
    //             $smsContent = 'Waste Collection Schedule for ' . $userLocation . ' on ' . $currentDate->copy()->addDay()->toDateString() . ':' . PHP_EOL;

    //             foreach ($schedules as $schedule) {
    //                 $smsContent .= "Location: {$schedule->location},\n Date: {$schedule->start},\n Time: {$schedule->time}" . PHP_EOL;
    //             }

    //             // Send SMS with the built content to the user's phone number (assuming it's stored in the user model)
    //             $response = $client->sms()->send(
    //                 new \Vonage\SMS\Message\SMS($user->phone_number, 'WDTS', $smsContent)
    //             );

    //             $message = $response->current();

    //             if ($message->getStatus() == 0) {
    //                 // SMS sent successfully
    //                 // You may want to log or store the success information
    //             } else {
    //                 // SMS sending failed
    //                 echo "The message failed with status: " . $message->getStatus() . "\n";
    //                 // You may want to handle the failure accordingly
    //             }
    //         }
    //     }

    //     return redirect()->route('collector-schedule')->with('message', 'SMS notifications were sent successfully');
    // }

}
