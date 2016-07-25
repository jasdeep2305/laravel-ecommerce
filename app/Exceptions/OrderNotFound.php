<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 7/21/2016
 * Time: 4:58 PM
 */

namespace App\Exceptions;


use Exception;


class OrderNotFound extends Exception
{
    /**
     * OrderNotFound constructor.
     * @param string $message
     * @param int $code
     * @param Exception|null $previous
     */
    public function __construct($message, $code=0, Exception $previous=null)
   {
       parent::__construct($message, $code, $previous);
   }

}