<?php

namespace App\Jobs;

use App\Entities\Order;
use App\Mail\OrderCreated;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class OrderCreatedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    private string $email;

    /**
     * @var int
     */
    private int $orderId;

    /**
     * Create a new job instance.
     *
     * @param string $request
     * @param int $orderId
     * @return void
     */
    public function __construct(string $email, int $orderId)
    {
        $this->email = $email;
        $this->orderId = $orderId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $order = Order::find($this->orderId);

        Mail::to($this->email)->send(new OrderCreated($order));
    }
}
