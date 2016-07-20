<?php

namespace App\Jobs;

use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class WelcomeUserMail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * @var User
     */
    private $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = $this->user;
        echo('Mail Sent about New User ');
        Mail::send('emails.user.welcomeUserMail', compact($this->user), function ($message) use ($user) {
            $message->from('divyadawra@instaveritas.com', 'Laravel');
            $message->to($user->email)->subject('Subject');
       });

    }
}
