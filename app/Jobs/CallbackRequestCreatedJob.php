<?php

namespace App\Jobs;

use App\Entities\CallbackRequest;
use App\Mail\CallbackRequestCreated;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CallbackRequestCreatedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    private string $email;

    /**
     * @var int
     */
    private int $callbackRequestId;

    /**
     * Create a new job instance.
     *
     * @param string $email
     * @param int $callbackRequestId
     * @return void
     */
    public function __construct(string $email, int $callbackRequestId)
    {
        $this->email = $email;
        $this->callbackRequestId = $callbackRequestId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (empty($this->email)) {
            return;
        }

        $request = CallbackRequest::find($this->callbackRequestId);

        Mail::to($this->email)->send(new CallbackRequestCreated($request));
    }
}
