<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name' => 'required|unique:categories,name,',
            'description' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'image' => 'mimes:png,jpg,jpeg,bmp'
        ]);
        
        $slug = Str::slug($request->name);

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $currentDate = Carbon::now()->toDateString();

            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            $path = public_path().'/uploads/category/';

            if(!File::exists($path)) 
            {
                File::makeDirectory($path, 0755, true, true);
            }

            $categoryImage = Image::make($image)->resize(400, 400);
            $categoryImage->save($path.$imageName);
        }
        
        $category = new Category();

        $category->name = $request->name;
        $category->slug = $slug;
        $category->description = $request->description;
        $category->status = $request->has('status')==TRUE ? 1 : 0;
        $category->popular = $request->has('popular')==TRUE ? 1 : 0;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->image = $request->hasFile('image') ? $imageName : NULL;

        $category->save();

        return redirect()->route('categories.index');
            
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
        $category = Category::find($id);

        return view('admin.category.edit', compact('category'));


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
            'name' => 'required|unique:categories,id',
            'description' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'image' => 'mimes:png,jpg,jpeg,bmp'
        ]);

        $category = Category::find($id);
        
        $slug = Str::slug($request->name);

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $currentDate = Carbon::now()->toDateString();

            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            $path = public_path().'/uploads/category/';

            $oldPath = public_path().'/uploads/category/' . $category->image;

            if(File::exists($oldPath))
            {
                File::delete($oldPath);
            }

            if(!File::exists($path)) 
            {
                File::makeDirectory($path, 0755, true, true);
            }

            $categoryImage = Image::make($image)->resize(400, 400);
            $categoryImage->save($path.$imageName);
        }

        $category->name = $request->name;
        $category->slug = $slug;
        $category->description = $request->description;
        $category->status = $request->has('status')==TRUE ? 1 : 0;
        $category->popular = $request->has('popular')==TRUE ? 1 : 0;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->image = $request->hasFile('image') ? $imageName : $category->image;

        $category->update();

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        $path = public_path().'/uploads/category/' . $category->image;

        if(File::exists($path))
        {
            File::delete($path);
        }

        $category->delete();

        return redirect()->route('categories.index');
    }
}
