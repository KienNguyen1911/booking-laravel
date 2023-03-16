<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function mailRegister($to, $name, $subject)
    {
        $name = $name;

        Mail::send('mail.new_account', compact('name'), function ($message) use ($to, $subject) {
            $message->to($to)->subject($subject);
        });
    }

    public function mailOrder($to, $order, $subject)
    {
        $order = Order::find($order->id);

        Mail::send('mail.new_order_user', compact('order'), function ($message) use ($to, $subject) {
            $message->to($to)->subject($subject);
        });
    }

    public function mailOrderOwner($to, $order, $subject)
    {
        $order = Order::find($order->id);

        Mail::send('mail.new_order_user', compact('order'), function ($message) use ($to, $subject) {
            $message->to($to)->subject($subject);
        });
    }
}
