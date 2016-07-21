<?php
/**
 * Created by PhpStorm.
 * User: JasdeepJazz
 * Date: 19/07/2016
 * Time: 15:50
 */

namespace App\Jobs;


use App\Product;
use App\User;
use Illuminate\Support\Facades\Mail;

trait EmailNotifier
{

    /**
     * @param User $user
     * @param Product $product
     * @param $view
     * @param $subject
     * @internal param User $users
     * @internal param User $user
     */

    public function sendEmail(User $user, Product $product, $view, $subject)
    {
        echo('Mail Sent about New Product ');

        Mail::send($view, compact('product'), function ($mail) use ($user,$subject) {

            $mail->from('Unkown@app.com', 'Your Application');
            $mail->to($user->email, $user->name)->subject($subject);
        });

    }

}