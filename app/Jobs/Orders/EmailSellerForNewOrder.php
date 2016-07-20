<?php

namespace App\Jobs\Orders;

use App\Jobs\Job;
use App\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EmailSellerForNewOrder extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    /**
     * @var Order
     */
    private $order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $order=$this->order;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $order=$this->order;
        Mail::send('emails.order.notifySellerForNewOrder', compact('order'), function ($message)  {
            $message->from('divyadawra@instaveritas.com', 'Laravel');
            $message->to('seller@seller.com')->subject('New product ordered');

        });
        
    }
}
