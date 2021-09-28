<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Article;

class SendNewMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $article;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->article = $article;  //prima salva il tuo oggetto, poi inietti le info che mostrerai nel testo della mail
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $article = $this->article;
        return $this->view('mail.newMail', compact('article'));
    }
}
