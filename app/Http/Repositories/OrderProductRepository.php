<?php
/**
 * Created by PhpStorm.
 * User: JasdeepJazz
 * Date: 12/07/2016
 * Time: 15:51
 */

namespace App\Http\Repositories;


use App\Contracts\Repository;
use App\OrderProduct;

class OrderProductRepository implements Repository
{

    /**
     * @param $id
     * @return mixed
     */
    public function getProductsForOrder($id)
    {
        return $this->find($id);
        //return OrderProduct::where('order_id',$id)->get();
    }

    /**
     * @param $request
     * @param $new_order
     * @return static
     */
    public function addProductToYourOrders($request, $new_order)
    {
        $params = $this->params($request, $new_order);
        $newProduct = OrderProduct::create($params);
        return $newProduct;
    }

    /**
     * Fetch required parameters
     * @param $request
     * @param $new_order
     * @return array
     */
    private function params($request, $new_order)
    {
        return [
            'product_id' => $request['product_id'],
            'order_id' => $new_order->id,
        ];
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function find($id)
    {
        return OrderProduct::where('order_id', $id)->get();
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function update($request,$id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}