<?php

namespace App\Jobs\Orders;

use App\Jobs\Job;
use App\Order;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailUserOrderConfirmation extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * @var Order
     */
    private $order;
    /**
     * @var User
     */
    private $user;

    /**
     * Create a new job instance.
     *
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //echo('Mail sent to User for Order Confirmation');
        $order = $this->order;

        Mail::send('emails.order.confirmationforuser', compact('order'), function ($message)  {
            $message->from('divyadawra@instaveritas.com', 'Laravel');
            $message->to('jasdeep@gmail.com')->subject('Your order has been placed');
        });
        
    }
    
}
