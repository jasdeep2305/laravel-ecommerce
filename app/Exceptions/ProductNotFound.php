<?php
/**
 * Created by PhpStorm.
 * User: JasdeepJazz
 * Date: 21/07/2016
 * Time: 16:55
 */

namespace App\Exceptions;

use Exception;

class ProductNotFound extends Exception
{
    public function __construct($message, $code=404, Exception $previous=null)
    {
        parent::__construct($message, $code, $previous);
    }

}