<?php

namespace App\Jobs\Product;

use App\Jobs\EmailNotifier;
use App\Jobs\Job;
use App\Product;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailToEditorsAboutProductUpdated extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels,EmailNotifier;
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
        //
        $this->product = $product;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //all editors
        $users = User::where('level_id', 2)->get();

        foreach ($users as $user) {
            $this->sendEmail($user, $this->product, 'emails.product.update','Product Updated');
        }
    }
}
