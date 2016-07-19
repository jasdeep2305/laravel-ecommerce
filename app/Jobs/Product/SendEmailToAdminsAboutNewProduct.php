<?php

namespace App\Jobs\Product;

use App\Jobs\EmailNotifier;
use App\Jobs\Job;
use App\Product;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailToAdminsAboutNewProduct extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels, EmailNotifier;
    /**
     * @var Product
     */
    private $product;

    /**
     * Create a new job instance.
     *
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Execute the job.
     *
     * @param Product $product
     */
    public function handle(Product $product)
    {
        //all admin users
        $users=User::where('level_id', 1)->get();

        foreach ($users as $user) {
            $this->sendEmail($user, $product, 'product.create');
        }
    }
}
