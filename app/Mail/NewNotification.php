<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $url, $attachment, $body, $subject, $recipient, $salutaion, $uploadedFiles;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body, $subject, $recipient, $url = null, $attachment = null, $salutaion = null, $uploadedFiles = [])
    {
        $this->url = $url;
        $this->attachment = $attachment;
        $this->body = $body;
        $this->subject = $subject;
        $this->recipient = $recipient;
        $this->salutaion = $salutaion;
        $this->uploadedFiles = is_array($uploadedFiles) ? $uploadedFiles : [];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->markdown('emails.NewNotification', [
            'url' => $this->url,
            'attachment' => $this->attachment,
            'body' => $this->body,
            'recipient' => $this->recipient,
        ])->subject($this->subject);

        foreach ($this->uploadedFiles as $file) {
            if (empty($file['path']) || !is_file($file['path'])) {
                continue;
            }

            $options = [];

            if (!empty($file['name'])) {
                $options['as'] = $file['name'];
            }

            if (!empty($file['mime'])) {
                $options['mime'] = $file['mime'];
            }

            $mail->attach($file['path'], $options);
        }

        return $mail;
    }
}
