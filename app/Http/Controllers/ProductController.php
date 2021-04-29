<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('category')->get();
        return view('pages.product.index',['products' => $products]);
    }


    public function create()
    {
        $categories = Category::all();
        return view('pages.product.add',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|string|max:255',
            'price' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);

        $file_name = $this->uploadFile($request->file('product_image'));


        Product::create([
            'title' => $request->title,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $file_name,
            'description' => $request->description
        ]);

        Session::flash('add', "Product added suscessfully");
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('pages.product.edit',[
            'categories'=>$categories,
            'product' => $product
            ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {


        $file_name = $this->uploadFile($request->file('product_image'));

        $request->image = $file_name;

        print_r($request->image);
        Product::updateOrCreate([
            'id' => $product->id
        ],
            $request->all()
            );

       // return back();
    }


    public function destroy(Product $product)
    {
        $product->delete();
        Session::flash('delete', "Product deleted suscessfully");
        return redirect()->route('products.index');
    }

    public function uploadFile($file)
    {
        $file_name = sprintf('%s.%s',  time(), $file->getClientOriginalExtension());

        if (Storage::disk('public')->put('/products/' . $file_name, $file->get())) {
            print_r('File uploaded');
            return $file_name;
        }

    }




}
