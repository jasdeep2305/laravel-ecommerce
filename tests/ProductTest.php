<?php


class ProductTest extends TestCase
{

    use \Illuminate\Foundation\Testing\DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */

    public function testExample()
    {
        $this->assertTrue(true);
    }


    // Test Case to create a product
    public function testCreateAProduct()
    {

        $created = factory(App\Product::class)->create();

        $product = App\Product::find($created->id);

        $this->assertEquals($created->title, $product->title);
    }
    // Test Product home page
    public function testProductHomePage()
    {
        $this->visit('/')->see('All Products');
    }
}
