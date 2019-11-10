<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;

class CartDetailController extends Controller
{
    //
    public function store(Request $request)
    {   
        $cartDetail = new CartDetail();
        $cartDetail->cart_id = auth()->user()->cart->id;
        $cartDetail->product_id = $request->product_id;
        $cartDetail->quantity = $request->quantity;
        $cartDetail->save();

        $notification = 'El producto fue agregado con exito.';
        return back()->with(compact('notification'));
    }


    //metodo destroy

    public function destroy(Request $request)
    {
      //eliminar archivo dfgfdfgdfdg
      $cartDetail = CartDetail::find($request->cart_detail_id);
      if ($cartDetail->cart_id == auth()->user()->cart->id)
          $cartDetail->delete();
      $notification = 'El producto fue eliminado con exito.';
      return back()->with(compact('notification'));
    }
}
