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
     *
     */
    public function index()
    {
        $products = $this->productRepository->viewAllProduct();
        return view ('product.index',compact('products'));
    }

    /**
     * Fetch a particular product
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {

         $product = $this->productRepository->viewProduct($id);
        return view('product.show', compact('product'));

    }

}
