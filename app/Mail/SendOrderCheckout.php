<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Order;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOrderCheckout extends Mailable
{
    use Queueable, SerializesModels;


    public User $user;
    public Order $order;

    public function __construct(User $user, Order $order)
    {
        $this->user = $user;
        $this->order = $order;
    }

    public function build()
    {
        return $this
            ->subject("Votre commande a été validé")
            ->view('mails.OrderCheckout', ['user' => $this->user, 'order' => $this->order]);
    }
}
