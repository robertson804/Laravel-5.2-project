<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Shipment;
use App\Order;


class ShipmentUnitTest extends PHPUnit_Framework_TestCase
{
    use DatabaseTransactions;

    /** @test */
    function it_can_add_orders(){
        
        factory(Order::class, 3)->create();

    }
}
