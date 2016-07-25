<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrderTest extends TestCase
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

    public function testCreateAOrder()
    {
        $user=factory(App\User::class)->create();
        $created=factory(App\Order::class)->create(['user_id' => $user->id]);
        $order=App\Order::find($created->id);
        $this->assertEquals($created->id,$order->id);
    }
}
