<?php
/**
 * Created by PhpStorm.
 * User: JasdeepJazz
 * Date: 12/07/2016
 * Time: 15:52
 */

namespace App\Http\Repositories;


use App\Contracts\Repository;
use App\Events\NewProductCreated;
use App\Events\ProductUpdated;
use App\Product;
use Illuminate\Support\Facades\Storage;

class ProductRepository implements Repository
{

    /**
     * Fetch products and return to controller
     * @param $id
     * @return mixed
     */
    public function viewProduct($id)
    {
        return Product::find($id);
        //return Product::find(1);
        //return Product::where('id',$id)->first();
    }

    /**
     * Fetch all the products
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function viewAllProduct()
    {
        return Product::all();
    }

    /**
     *
     * Add a new product to DB
     * @param $request
     */
    public function addNewProduct($request)
    {
        $params = $this->params($request);
        $this->uploadFile($request->file('product_image'));
        $product= Product::create($params);
        event(new NewProductCreated($product));
        return $product;
    }

    /**
     * Get required parameters from Request object for adding a new product
     * @param $request
     * @return array
     */
    private function params($request)
    {
        return [
            'title' => $request['product_title'],
            'description' => $request['product_description'],
            'seller_id' => $request['product_sellerid'],
            'seller_name' => $request['product_sellername'],
            'price' => $request['product_price']
        ];
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function find($id)
    {
        $product= Product::find($id)->first();
        event(new ProductUpdated($product));
        return $product;
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function update($request, $id)
    {
       $param=$this->params($request);
        return $this->updateProduct($param,$id);

    }

    /**
     * Delete a product
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return Product::where('id', $id)->delete();
    }

    /**
     * Upload a file specific to a product
     * @param $file
     */
    private function uploadFile($file)
    {
        if ($file) {

            Storage::put($file->getClientOriginalName(), file_get_contents($file));
        }

    }

    private function updateProduct($request,$id)
    {

        $product= Product::where('id',$id)
            ->update(['title' => $request['title'],
                'description'=>$request['description'],
                'seller_name'=>$request['seller_name'],
                'seller_id' => $request['seller_id'],
                'price' => $request['price']
            ]);
        return $product;
    }


}
