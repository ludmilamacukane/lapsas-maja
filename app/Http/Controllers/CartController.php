<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $total     = 0;
        $result    = [];
        $cartItems = $request->session()->get('cart', []);
        
        foreach ($cartItems as $id => $amount)
        {
            if ($amount > 0)
            {
                $item    = [];
                $product = Product::findOrFail($id);

                $item['product'] = $product;
                $item['amount']  = $amount;
                $item['total']   = $product->price * $amount;

                $total += $item['total'];

                $result[] = $item;
            }
        }
        
        return view('cart.show', ['total' => $total, 'products' => $result]);
    }

    /**
     * @param Request $request
     * @param         $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function add(Request $request, $id)
    {
        $cartItems = $request->session()->get('cart', []);
        
        // if already in the shopping cart, increase by 1
        if (array_key_exists($id, $cartItems)) {
            $request->session()->put(sprintf('cart.%d', $id), $cartItems[$id]+1);
        } else {
            $request->session()->put(sprintf('cart.%d', $id), 1);
        }
        
        return redirect('cart');
    }

    /**
     * @param Request $request
     * @param         $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function remove(Request $request, $id)
    {
        $cartItems = $request->session()->get('cart', []);
        
        // if in the shopping cart, decrease by 1
        if (array_key_exists($id, $cartItems) && $cartItems[$id] > 0) {
            $request->session()->put(sprintf('cart.%d', $id), $cartItems[$id]-1);
        }
        
        return redirect('cart');
    }
}
