<?php

namespace Tests\Unit;

use App\Services\CheckoutService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class CheckoutTest extends TestCase
{
    use RefreshDatabase;

    public function setup():void
    {
        parent::setUp();
        Artisan::call('db:seed');
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    //exam scan FR1 SR1 FR1 FR1 CF1
    public function test_checkout1()
    {
        $pricing_rules = [
          'FR1' =>['get_one_free'],
            'SR1'=>['bulk_discount',3,4.50],
        ];
        $co = new CheckoutService($pricing_rules);
        $co ->scan('FR1');
        $co ->scan('SR1');
        $co ->scan('FR1');
        $co ->scan('FR1');
        $co ->scan('CF1');
        $this->assertEquals(22.45, $co->total);
    }
}
