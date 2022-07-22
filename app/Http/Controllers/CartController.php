<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /** 
     * Get cart.
     */
    public function index(Request $request){
        $cart = session("cart" );
        // dd($cart);
        return $cart;
    }

    /** 
     * Set cart.
     */
    public function set(){

        session(["cart" => request("cart")]);
        $cart = session("cart");
        return request("cart");
        // return $cart ;
    }
}
