<?php


class ProductTest extends TestCase
{


    /**
     * A basic test example.
     *
     * @return void
     */

    public function testExample()
    {
        $this->assertTrue(true);
    }

//    public function testCreateAProduct()
//    {
//        $created=factory(App\Product::class)->create();
//
//        $product=App\Product::find(4)->first();
//
//        $this->assertEquals($created->title,$product->title);
//    }

    public function testProductHomePage()
    {
        $this->visit('/')->see('All Products');
    }
}
