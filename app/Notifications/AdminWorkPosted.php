<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\SlackMessage;

class AdminWorkPosted extends Notification
{
    use Queueable;
    private $work;
     /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($work)
    {
        $this->work = $work;
    }
     /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }
     /**
     * Get the Slack representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\SlackMessage
     */
    public function toSlack($notifiable)
    {
        $work = $this->work;
        $url = config('app.url').'/works/detail/'.$this->work->slug;
        return (new SlackMessage)
            ->success()
            ->content('Une nouvelle offre vient d\'être ajoutée !')
            ->attachment(function ($attachment) use ($url) {
                    $attachment->title($this->work->title, $url)
                               ->fields([
                                    'Contenu' => $this->work->content,
                                ]);
                });
    }
}