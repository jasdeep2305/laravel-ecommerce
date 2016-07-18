<?php
/**
 * Created by PhpStorm.
 * User: JasdeepJazz
 * Date: 12/07/2016
 * Time: 15:52
 */

namespace App\Http\Repositories;


use App\Contracts\Repository;
use App\Product;

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
        return Product::create($params);
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
        // TODO: Implement find() method.
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function update($id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}