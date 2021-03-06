<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProductRepository;
use App\Http\Requests\CreateProductRequest;
use App\Listeners\NewProductConfirmation;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        //$this->middleware('editor')->only(['create', 'store']);
        $this->productRepository = $productRepository;
    }

    /**
     * View All Products
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = $this->productRepository->all();
        return view('product.index', compact('products'));
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
        $this->authorize('create', new Product());
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

    /**
     * Delete a product
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->authorize('delete', new Product());
        $this->productRepository->delete($id);

        if(request()->ajax())
        {
            return [
                'message' => 'Deleted',
                'status' => 200
            ];
        }

        return redirect()->to('/products');
    }

    /**
     * Update a product's field
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->productRepository->update($request, $id);
        return redirect()->to('/products');
    }

    /**
     * Edit a product
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $this->authorize('edit',new Product());
        $product = $this->productRepository->find($id);
        return view('product.edit', compact('product'));
    }

}
