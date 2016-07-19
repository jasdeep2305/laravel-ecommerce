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
     * @param User $users
     * @param Product $product
     * @param $view
     * @internal param User $user
     */

    public function sendEmail(User $user, Product $product, $view)
    {

            dd('Mail Sent');
            Mail::sent();


    }

}