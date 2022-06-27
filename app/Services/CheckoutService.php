<?php
namespace App\Services;



use App\Models\Cart;
use App\Models\Product;

class CheckoutService{

    private $pricing_rules;
    public $total;


    public function __construct($pricing_rules)
    {
        $this->pricing_rules = $pricing_rules;
    }

    public function scan(string $item)
    {
        $product = Product::where('product_code', $item)->first();
        if ($product){
            Cart::create(['product_id'=>$product->id]);
            $this->total = $this->getTotal();
        }

    }

    private function getTotal()
    {
        $cart_products = Cart::query()
            ->join('products','carts.product_id', '=','products.id')
            ->selectRaw('products.product_code,products.price, sum(carts.qty) as quantity')
            ->groupByRaw('products.product_code, products.price')
            ->get();
        dd($cart_products);
        $total = 0;
        foreach ($cart_products as $product){
            $total += $product->quantity * $product->price;
        }
     return $total;
    }

}
