<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\NewNotification;
use Illuminate\Http\Request;

class WasteCollectionSchedule extends Controller
{
    public function sendNotification()
    {
        $users = User::all();
        $notification = new NewNotification();

        foreach ($users as $user) {
            $user->notify($notification);
        }

        return "Notification sent to all users.";
    }

    public function showNotificationForm()
    {
        return view('schedule');
    }
}
