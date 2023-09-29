<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::select(['id','brand_name','brand_image','brand_slug'])->paginate(3);
        return view('admin.pages.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(120,120)->save('uploads/brand/'.$name_gen);
        $save_url = $name_gen;

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_slug' => strtolower(str_replace(' ', '-',$request->brand_name)),
            'brand_image' => $save_url,
            'created_at'=>Carbon::now() 
        ]);
        Alert::success('Brand Added Successfully');
        return redirect()->route('brand.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brands_update = Brand::findOrFail($id);
        return view('admin.pages.brand.edit',compact('brands_update'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand = Brand::find($id);
        $brand->brand_name = $request->input('brand_name');
        $brand->brand_slug = strtolower(str_replace(' ', '-',$request->brand_name));

        if($request->hasFile('brand_image'))
        {
            $destination = 'uploads/brand/'.$brand->brand_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $image = $request->file('brand_image');
            $extension = $image->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $image->move('uploads/brand/',$filename);
            $brand->brand_image = $filename;
        }
        $brand->update();
        Alert::success('Brand Updated');
        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        $delete_path = public_path() . '/uploads/brand/'.$old_image;
        unlink($delete_path);
        Brand::find($id)->delete();
        Alert::error('Brand deleted');
        return redirect()->route('brand.index');
    }
}
