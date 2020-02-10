<?php

namespace App\Services;

use App\Jobs\OrderCreatedJob;

class NotificationService
{
    /**
     * @param string $email
     * @return void
     */
    public function sendEmailNotification(string $email, int $orderId)
    {
        dispatch(new OrderCreatedJob($email, $orderId));

        logger("ORDER {$orderId} | Notification sent to {$email}");
    }
}
