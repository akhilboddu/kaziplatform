<?php

namespace App\Notifications;

use App\Invitation;
use App\User;
use App\Cluster;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class InvitationSent extends Notification
{
    use Queueable;

    protected $invitation;
    protected $cluster;
    protected $sender;
    protected $receiver;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Invitation $invitation, Cluster $cluster, User $sender, User $receiver)
    {
        $this->invitation = $invitation;
        $this->cluster = $cluster;
        $this->sender = $sender;
        $this->receiver = $receiver;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }




    public function toDatabase($notifiable)
    {
        return [
            'invitation' => $this->invitation,
            'cluster' => $this->cluster,
            'sender' => $this->sender,
            'receiver' => $this->receiver
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    //can also return a view
                    ->line('Looks like someone sent you an invitation!')
                    ->line('Login now to view your notification!')
                    ->action('Login', url('/'))
                    ->line('Thank you for using Kazi Technologies!');
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
