<?php

namespace App\Observers;

use App\Entities\Order;
use App\Services\NotificationService;

class OrderObserver
{
    /**
     * Handle the order "created" event.
     *
     * @param  \App\Entities\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        $service = app(NotificationService::class);
        $service->sendEmailNotification('autoglasshouse20@gmail.com', $order->id);
    }
}
