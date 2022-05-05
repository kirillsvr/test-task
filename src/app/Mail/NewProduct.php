<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewProduct extends Mailable
{
    use Queueable, SerializesModels;

    protected array $formData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $formData)
    {
        $this->formData = $formData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.new_product')->with($this->formData);
    }
}
