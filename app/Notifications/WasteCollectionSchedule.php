<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WasteCollectionSchedule extends Notification
{
    use Queueable;

    protected $schedules;

    /**
     * Create a new notification instance.
     */
    public function __construct($schedules)
    {
        $this->schedules = $schedules;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
         // Create a string to display date and time information
         $scheduleInfo = '';

         foreach ($this->schedules as $schedule) {
             // Assuming you have 'date' and 'time' columns in your Schedule model
             $scheduleInfo .= "Date: {$schedule->start}, Time: {$schedule->time}\n";
         }

         return (new MailMessage)
             ->line('The time of collection will be on:')
             ->line($scheduleInfo)
             ->action('Notification Action', url('/'))
             ->line('Thank you for understanding!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
