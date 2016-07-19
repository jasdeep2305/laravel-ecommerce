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
    public function all();
    public function find($id);
    public function create();
    public function update($request,$id);
    public function delete($id);

}