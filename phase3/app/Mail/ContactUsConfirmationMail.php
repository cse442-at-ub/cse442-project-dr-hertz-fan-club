<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUsConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $topic;
    public $message;
    public $attachment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $topic, $message, $attachment)
    {
#        $name, $email, $phone, $topic, $message
        $this->name = $name;
        $this->email = $email;
        $this->topic = $topic;
        $this->message = $message;
        $this->attachment = $attachment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
#        return $this->markdown('email.contactustemplate');
        if (is_null($this->attachment)) {
            return $this->subject('[UB Market] Thank you for contacting us, ' . $this->name . '!')
                    ->markdown('email.contactusconfirmationtemplate');
        } else {
            return $this->subject('[UB Market] Thank you for contacting us, ' . $this->name . '!')
                    ->markdown('email.contactusconfirmationtemplate')
                    ->attach($this->attachment->getRealPath(),
                    [
                        'as' => $this->attachment->getClientOriginalName(),
                        'mime' => $this->attachment->getClientMimeType(),
                    ]);
        }
    }
}
