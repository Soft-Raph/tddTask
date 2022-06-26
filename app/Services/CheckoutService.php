<?php
namespace App\Services;

class CheckoutService{

    private $pricing_rules;
    public $total =0;


    public function __construct($pricing_rules)
    {
        $this->pricing_rules = $pricing_rules;
    }

    public function scan(string $item)
    {
        $this->total = 0;
    }

}
