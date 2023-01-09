<?php

namespace App\Notifications;

use Carbon\Carbon;
use App\Product;
use App\Entrepot;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProductAvertissment extends Notification
{
    use Queueable;
    private $pro;
    private $ent;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Product $pro,Entrepot $ent)
    {
        $this->pro=$pro;
        $this->ent=$ent;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'product_id'=>$this->pro->id,
            'product_name'=>$this->pro->name,
            'entrepot_id'=>$this->ent->id,
            'entrepot_name'=>$this->ent->nom,
            

        ];
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
            //
        ];
    }
}
