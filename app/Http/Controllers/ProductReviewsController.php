<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProductReviewsController extends Controller
{
    public function index($product_id)
    {
        return $product_id;
    }

    public function show($product_id, $review_id){

        echo $product_id.'<br>';
        echo $review_id;

    }
    
}
