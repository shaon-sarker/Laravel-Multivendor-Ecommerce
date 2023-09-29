<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as Image;
use RealRashid\SweetAlert\Facades\Alert;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys = Category::select(['id','category_name','category_image','category_slug'])->paginate(3);
        return view('admin.pages.category.index',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->file('category_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(120,120)->save('uploads/category/'.$name_gen);
        $save_url = $name_gen;

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
            'category_image' => $save_url,
            'created_at'=>Carbon::now() 
        ]);
        Alert::success('Category Added Successfully');
        return redirect()->route('category.index');


        // return redirect()->route('all.category')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoys_update = Category::findOrFail($id);
        return view('admin.pages.category.edit',compact('categoys_update'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $category->category_name = $request->input('category_name');
        $category->category_slug = strtolower(str_replace(' ', '-',$request->category_name));

        if($request->hasFile('category_image'))
        {
            $destination = 'uploads/category/'.$category->category_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $image = $request->file('category_image');
            $extension = $image->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $image->move('uploads/category/',$filename);
            $category->category_image = $filename;
        }
        $category->update();
        Alert::success('Category Updated');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = Category::find($id);
        $old_image = $image->category_image;
        $delete_path = public_path() . '/uploads/category/'.$old_image;
        unlink($delete_path);
        Category::find($id)->delete();
        Alert::error('Category deleted');
        return redirect()->route('category.index');
    }
}
