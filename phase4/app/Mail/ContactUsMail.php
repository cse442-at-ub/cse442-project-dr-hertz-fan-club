<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\UploadedFile;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $phone;
    public $topic;
    public $message;
    public $attachment;
    public $filemsg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $phone, $topic, $message, $attachment)
    {
#        $name, $email, $phone, $topic, $message
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->topic = $topic;
        $this->message = $message;
        $this->attachment = $attachment;

        if (is_null($this->attachment)) {
            $this->filemsg = "There are no attachments.";
        } else {
            $this->filemsg = "Please check the attachment(s) below.";
        }


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
            return $this->subject('[UB Market Contact] ' . $this->name . "'s " . $this->topic)
                    ->from($this->from)
                    ->markdown('email.contactustemplate');
        } else {
            return $this->subject('[UB Market Contact] ' . $this->name . "'s " . $this->topic)
                    ->from($this->from)
                    ->markdown('email.contactustemplate')
                    ->attach($this->attachment->getRealPath(),
                    [
                        'as' => $this->attachment->getClientOriginalName(),
                        'mime' => $this->attachment->getClientMimeType(),
                    ]);
        }
    }
}
