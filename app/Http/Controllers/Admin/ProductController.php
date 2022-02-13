<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.product.create', compact('categories'));
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
            'name' => 'required|unique:products,name,',
            'short_description' => 'required',
            'description' => 'required',
            'category' => 'required',
            'qty' => 'required|numeric|gte:0',
            'tax' => 'required|numeric|gte:0',
            'original_price' => 'required|numeric|gte:0',
            'selling_price' => 'required|numeric|gte:0',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,bmp'
        ]);

        $slug = Str::slug($request->name);

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $currentDate = Carbon::now()->toDateString();

            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            $path = public_path().'/uploads/product/';

            if(!File::exists($path)) 
            {
                File::makeDirectory($path, 0755, true, true);
            }

            $productImage = Image::make($image)->resize(500, 775);
            $productImage->save($path.$imageName);
        }
        
        $product = new Product();

        $product->category_id = Category::find($request->category)->id;
        $product->name = $request->name;
        $product->slug = $slug;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->status = $request->has('status')==TRUE ? 1 : 0;
        $product->trending = $request->has('trending')==TRUE ? 1 : 0;
        $product->qty = $request->qty;
        $product->tax = $request->tax;
        $product->original_price = $request->original_price;
        $product->selling_price = $request->selling_price;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;
        $product->image = $request->hasFile('image') ? $imageName : NULL;

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product Created Successfully');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        return view('admin.product.edit', compact('product', 'categories'));
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
        $this->validate($request, [
            'name' => 'required|unique:products,id',
            'short_description' => 'required',
            'description' => 'required',
            'category' => 'required',
            'qty' => 'required|numeric|gte:0',
            'tax' => 'required|numeric|gte:0',
            'original_price' => 'required|numeric|gte:0',
            'selling_price' => 'required|numeric|gte:0',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,bmp'
        ]);

        $product = Product::find($id);

        $slug = Str::slug($request->name);

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $currentDate = Carbon::now()->toDateString();

            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            $path = public_path().'/uploads/product/';

            $oldPath = public_path().'/uploads/product/' . $product->image;

            if(File::exists($oldPath))
            {
                File::delete($oldPath);
            }

            if(!File::exists($path)) 
            {
                File::makeDirectory($path, 0755, true, true);
            }

            $productImage = Image::make($image)->resize(500, 775);
            $productImage->save($path.$imageName);
        }

        $product->category_id = Category::find($request->category)->id;
        $product->name = $request->name;
        $product->slug = $slug;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->status = $request->has('status')==TRUE ? 1 : 0;
        $product->trending = $request->has('trending')==TRUE ? 1 : 0;
        $product->qty = $request->qty;
        $product->tax = $request->tax;
        $product->original_price = $request->original_price;
        $product->selling_price = $request->selling_price;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;
        $product->image = $request->hasFile('image') ? $imageName : $product->image;

        $product->update();

        return redirect()->route('products.index')->with('success', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $path = public_path().'/uploads/product/' . $product->image;

        if(File::exists($path))
        {
            File::delete($path);
        }

        $product->delete();

        return redirect()->route('products.index');
    }
}
