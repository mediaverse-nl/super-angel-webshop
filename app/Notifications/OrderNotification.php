<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderNotification extends Notification
{
    use Queueable;

    protected $model;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    /**
     * @param $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'from' => $this->message->name,
            'name'=> $this->message->email,
            'subject' => $this->message->subject,
            'model' => $this->model,
            'created_at' => Carbon::parse('Y-m-d H'),
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
