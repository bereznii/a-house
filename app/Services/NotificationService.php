<?php

namespace App\Services;

use App\Jobs\OrderCreatedJob;
use App\Mail\OrderCreated;
use Illuminate\Support\Facades\Mail;

class NotificationService
{
    /**
     * @param string $email
     * @return void
     */
    public function sendEmailNotification(string $email, int $orderId)
    {
        dispatch(new OrderCreatedJob($email, $orderId));

        logger('notification sent');
    }
}
