<?php

namespace App\Jobs\Product;

use App\Jobs\EmailNotifier;
use App\Jobs\Job;
use App\Product;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailToEditorsAboutProductUpdated extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels,EmailNotifier;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Product $product)
    {
        //all editors
        $users = User::where('level_id', 2)->get();
        foreach ($users as $user) {
            $this->sendEmail($user, $product, 'product.update');
        }
    }
}
