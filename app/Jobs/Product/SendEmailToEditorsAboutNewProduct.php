<?php

namespace App\Jobs\Product;

use App\Jobs\EmailNotifier;
use App\Jobs\Job;
use App\Product;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailToEditorsAboutNewProduct extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels, EmailNotifier;
    /**
     * @var Product
     */
    private $product;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        //
        $this->product = $product;
    }

    /**
     * Execute the job.
     *
     * @param Product $product
     */
    public function handle()
    {
        //all editor users
        $users = User::where('level_id', 2)->get();
        foreach ($users as $user) {
            $this->sendEmail($user, $this->product,'emails.product.create','New Product Added');
        }
    }
}
