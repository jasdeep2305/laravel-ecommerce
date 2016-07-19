<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProductRepository;
use App\Http\Requests\CreateProductRequest;
use App\Product;
use Illuminate\Http\Request;

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
        $this->middleware('editor')->only(['create','store']);
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

    /**
     * Load form for adding a new product
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Add a new product
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateProductRequest $request)
    {

        $this->productRepository->addNewProduct($request);
        return redirect()->to('/products');
    }
    
   
    public function destroy($id)
    {

        $this->productRepository->delete($id);
        return redirect()->to('/products');
    }

}
