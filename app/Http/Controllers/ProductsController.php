<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.list', ['products' => Product::where('enabled', true)->get()]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $product = Product::where('id', $id)->where('enabled', true)->get()->first();
        return view('product.show', ['product' => $product]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        if (true === Auth::user()->isAdmin()) {
            return view('product.add');
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        if (true === Auth::user()->isAdmin()) {
            return view('product.edit', ['product' => Product::find($id)]);
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function remove(int $id)
    {
        if (true === Auth::user()->isAdmin()) {
            $product          = Product::find($id);
            $product->enabled = false;
            $product->update();

            return redirect()->action('ProductsController@index');
        }
    }

    /**
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, Request $request)
    {
        if (true === Auth::user()->isAdmin()) {
            $request->validate(
                [
                    'name'        => 'required|max:255',
                    'description' => 'required|max:255',
                    'price'       => 'required|numeric|between:1,10000',
                ]
            );

            $product              = Product::find($id);
            $product->name        = $request->get('name');
            $product->description = $request->get('description');
            $product->price       = $request->get('price');
            $product->update();

            return redirect()->action('ProductsController@show', ['id' => $product->id]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (true === Auth::user()->isAdmin()) {
            $request->validate(
                [
                    'name'        => 'required|unique:products|max:255',
                    'description' => 'required|max:255',
                    'price'       => 'required|numeric|between:1,10000',
                ]
            );

            $product              = new Product();
            $product->name        = $request->get('name');
            $product->description = $request->get('description');
            $product->price       = $request->get('price');
            $product->save();

            return redirect()->action('ProductsController@show', ['id' => $product->id]);
        }
    }
}
