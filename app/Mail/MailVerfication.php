<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;

class MailVerfication extends Mailable
{
    use Queueable, SerializesModels;
    // public $otp;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        // $this-> = $url;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return (new MailMessage)
        // ->line('The introduction to the notification.')
        // ->action('Notification Action', url('/'))
        // ->line('Thank you for using our application!');
        
        return $this->view('mails.verfy')
        ->from('islamsh.diamondo@gmail.com', env('MAIL_FROM_NAME'))
        ->subject(trans('email.verify'))
        ->with([
           'otp' => $this->user->otp
       ]);       
 


         }
}
