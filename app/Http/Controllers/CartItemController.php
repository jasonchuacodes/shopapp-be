<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;


class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //

        $cartItem = CartItem::with('product')
            ->where('cart_id', $id)
            ->get();
        return response()->json($cartItem);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    //     CartItem::updateOrCreate(['product_id' => $request->product_id], 
    //     ['cart_id' => $request->cart_id,
    //     'product_qty' => $request->product_qty]
    // );
    
    $cartItem = CartItem::where('product_id', $request->product_id)->exists();
    
        if ($cartItem) {
            CartItem::where('product_id', $request->product_id)
            ->increment('product_qty', $request->product_qty);
            
            return response()->json('item exists');
        } 
        else {
        CartItem::create([
            'cart_id' => $request->cart_id,
            'product_id' => $request->product_id,
            'product_qty' => $request->product_qty
        ]);
            return response()->json('new item created');
        }

        // working code but has bug -> if the same product_id is added, it will create new item instead of updating
        // CartItem::create([
        //     'cart_id' => $request->cart_id,
        //     'product_id' => $request->product_id,
        //     'product_qty' => $request->product_qty
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
