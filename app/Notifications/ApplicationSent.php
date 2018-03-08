<?php

namespace App\Notifications;

use App\Application;
use App\Cluster;
use App\Job;
use App\Client;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ApplicationSent extends Notification
{
    use Queueable;

    protected $application;
    protected $cluster;
    protected $job;
    protected $client;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Application $application, Cluster $cluster, Job $job, Client $client)
    {
        $this->application = $application;
        $this->cluster = $cluster;
        $this->job = $job;
        $this->client = $client;
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

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Looks like a cluster has Applied for one of the jobs you posted!')
                    ->line('Check your notifications!')
                    ->action('Notification Action', url('/client'))
                    ->line('Thank you for using Kazi Technologies!');
    }


    public function toDatabase($notifiable)
    {
        return [
            'application' => $this->application,
            'cluster' => $this->cluster,
            'job' => $this->job,
            'client' => $this->client
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
