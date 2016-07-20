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
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
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
        $cache= Cache::get('product'.$id);
        if($cache)
        {
            return $cache;
        }
        else
        {
            $product=Product::find($id);
            $expiresAt=Carbon::now()->addDay(1);
            Cache::put('product'.$id,$product,$expiresAt);
            return $product;
        }

        $cache=Cache::get('product'.$id,function ()use ($id){
            return Product::find($id);
        });
    }

    /**
     *
     * Add a new product to DB and fire event
     * @param $request
     */
    public function addNewProduct($request)
    {
        $params = $this->params($request);
        $this->uploadFile($request->file('product_image'));
        $product = Product::create($params);
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

    /**
     * Fetch all the products
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return Product::paginate(1);
    }

    public function find($id)
    {
        return Product::find($id)->first();
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    /**
     * Get required parameters and call updateProduct function
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        $param = $this->params($request);
        return $this->updateProduct($param, $id);
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
        if ($file)
        {
            Storage::put($file->getClientOriginalName(), file_get_contents($file));
        }
    }

    /**
     * Update the product and fire an event to sent Email
     * @param $request
     * @param $id
     * @return mixed
     */
    private function updateProduct($request, $id)
    {
        $product = Product::where('id', $id)->update($request);
        $update_product = Product::find($id)->first();
        event(new ProductUpdated($update_product));
        return $product;
    }
}
