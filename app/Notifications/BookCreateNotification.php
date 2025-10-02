<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookCreateNotification extends Notification
{
    use Queueable;
    protected $book;

    /**
     * Create a new notification instance.
     */
    public function __construct($book)
    {
        //
        $this->book = $book;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Novo livro Criado')
                    ->view('/email.book_created',['book'=> $this->book]); //utilizando View para formatar o corpo do email

                    /* ->line('Um novo livro foi adicionado à estante.')
                    ->line('Título: '. $this->book->titulo)
                    ->line('Autor: '. ($this->book->author->Nome ?? 'Desconhecido'))
                    ->line('Editora: '. ($this->book->titulo->nome ??'Desconhecido'))
                    ->line('Detalhes: '. ($this->book->book_details->summary ??'Sem informações'))
                    ->action('Ver Livro', url('/api/books/'.$this->book->id))
                    ->line('Obrigado por usar nosso sistema!'); */
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'book_id'=>$this->book->id,
            'titulo'=>$this->book->titulo,
            
        ];
    }
}
