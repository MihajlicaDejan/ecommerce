<?php

namespace App\Http\Controllers;
use Session;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.index', compact('products'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'name'        => 'required',
           'price'       => 'required',
           'image'       => 'required|image',
           'description' => 'required'
        ]);

        $image = $request->image;
        $image_new_name = time(). $image->getClientOriginalName();
        $image->move('uploads/images', $image_new_name);

        $product = Product::create([
           'name' => $request->name,
           'price' => $request->price,
           'image' => 'uploads/images/'. $image_new_name,
           'description' => $request->description
        ]);

        $product->save();

        Session::flash('success', 'Product is created');
        return redirect()->back();
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'        => 'required',
            'price'       => 'required',
            'image'       => 'required|image',
            'description' => 'required'
        ]);

        $product = Product::findOrFail($id);
        if($request->hasFile('image'))
        {
            $image = $request->image;
            $image_new_name = time(). $image->getClientOriginalName();
            $image->move('uploads/images', $image_new_name);
            $product->image = 'uploads/images/'.$image_new_name;
        }

        $product->name          = $request->name;
        $product->price         = $request->price;
        $product->description   = $request->description;

        $product->save();

        Session::flash('success', 'Produc is updated!');
        return redirect()->route('products');
    }

    public function destroy($id)
    {

        $product = Product::findOrFail($id);

        $product->delete();

        Session::flash('success', 'Produc is deleted!');
        return redirect()->back();
    }
}
