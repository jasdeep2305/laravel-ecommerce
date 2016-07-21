<?php
/**
 * Created by PhpStorm.
 * User: JasdeepJazz
 * Date: 18/07/2016
 * Time: 14:14
 */

namespace App\Contracts;


Interface Repository
{
    /**
     * @return mixed
     */
    public function all();

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @return mixed
     */
    public function create();

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request,$id);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

}