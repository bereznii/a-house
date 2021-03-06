<?php

namespace App\Observers;

use App\Entities\Order;
use App\Services\EmailNotificationService;

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
        $service = app(EmailNotificationService::class);
        $service->sendCreatedOrderNotification($order->id);
    }
}
