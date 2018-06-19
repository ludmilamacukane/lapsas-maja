<?php

namespace App\Http\Controllers;

use App\ProductOrder;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('order.list', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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

        return view('order.create', [
            'total'    => $total,
            'products' => $result
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|max:255',
            'phone'   => 'required|integer|digits_between:5,32',
            'comment' => 'max:255'
        ]);

        $order          = new Order();
        $order->user_id = Auth::user()->id;
        $order->address = $request->get('address');
        $order->phone   = $request->get('phone');
        $order->comment = $request->get('comment');
        $order->save();

        $cartItems = $request->session()->get('cart', []);
        foreach ($cartItems as $id => $amount) {
            if ($amount > 0) {
                $product                  = Product::findOrFail($id);
                $productOrder             = new ProductOrder();
                $productOrder->amount     = $amount;
                $productOrder->price      = $product->price * $amount;
                $productOrder->order_id   = $order->id;
                $productOrder->product_id = $id;
                $productOrder->save();
            }
        }

        // delete the cart from session
        $request->session()->put('cart', []);

        return redirect()->action('OrderController@show', ['id' => $order->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('order.show', ['order' => Order::find($id)]);
    }
}
