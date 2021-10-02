<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;

class ForgitMail extends Mailable
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
        
        return $this->view('mails.forgit')
        ->from('islamsh.diamondo@gmail.com', env('MAIL_FROM_NAME'))
        ->subject(trans('success.forgit email'))
        ->with([
           'otp' => $this->user->otp
        ]);       
          }
}
