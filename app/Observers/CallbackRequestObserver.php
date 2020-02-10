<?php

namespace App\Observers;

use App\Entities\CallbackRequest;
use App\Services\EmailNotificationService;

class CallbackRequestObserver
{
    /**
     * Handle the order "created" event.
     *
     * @param  \App\Entities\CallbackRequest  $callbackRequest
     * @return void
     */
    public function created(CallbackRequest $callbackRequest)
    {
        $service = app(EmailNotificationService::class);
        $service->sendCreatedCallbackRequestNotification($callbackRequest->id);
    }
}
