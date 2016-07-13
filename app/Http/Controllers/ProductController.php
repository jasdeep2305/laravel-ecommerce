<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProductRepository;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * ProductController constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {

        $this->productRepository = $productRepository;
    }

    /**
     * Fetch a particular product
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Product $product)
    {

        $product = $this->productRepository->viewProduct($product->id);
        return view('product.show', compact('product'));

    }

}
