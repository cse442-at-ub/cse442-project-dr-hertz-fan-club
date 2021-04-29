<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactPostOwnerConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $topic;
    public $message;
    public $posturl;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $topic, $message, $posturl)
    {

        $this->name = $name;
        $this->email = $email;
        $this->topic = $topic;
        $this->message = $message;
        $this->posturl = $posturl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
#        return $this->markdown('email.contactustemplate');
        return $this->subject('[UB Market] Thank you for using our service, ' . $this->name . '!')
            ->markdown('email.contactpostownerconfirmationtemplate');
        
    }
}
