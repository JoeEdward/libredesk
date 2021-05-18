<?php

namespace App\Notifications;

use App\Models\book;
use App\Models\loan;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookOverdue extends Notification
{
    use Queueable;
    protected $book;
    protected $loan;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(loan $loan)
    {
        $this->loan = $loan;
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
                    ->from('libredesk_noreply@libredesk.com', 'Libredesk')
                    ->subject('Book Overdue!')
                    ->view('email.overdue', ['loan' => $this->loan]);
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
            'book_id' => $this->loan->book->id,
            'loan_id' => $this->loan->id,
        ];
    }
}
