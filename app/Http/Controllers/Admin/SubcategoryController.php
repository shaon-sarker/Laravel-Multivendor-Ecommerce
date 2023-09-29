<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $subcategorys = Subcategory::select(['id','category_id','subcategory_name','subcategory_slug'])->with('category')->paginate(3);
        return view('admin.pages.subcategory.index',compact('subcategorys'));
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorys = Category::select(['id','category_name'])->get();
        return view('admin.pages.subcategory.create',compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Subcategory::insert([
            'category_id'=>$request->category_id,
            'subcategory_name'=>$request->subcategory_name,
            'subcategory_slug'=>strtolower(str_replace(' ', '-',$request->subcategory_name)),
            'created_at'=>Carbon::now()
        ]);
        Alert::success('Sub-Category Added Successfully');
        return redirect()->route('subcategory.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subcategoys_update = Subcategory::findOrFail($id);
        $categorys = Category::select(['id','category_name'])->get();
        return view('admin.pages.subcategory.edit',compact('categorys','subcategoys_update'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->update([
            'category_id'=>$request->category_id,
            'subcategory_name'=>$request->subcategory_name,
            'subcategory_slug'=>strtolower(str_replace(' ', '-',$request->subcategory_name)),
            'updated_at'=>Carbon::now()
        ]);

        Alert::success('Sub-Category Updated Successfully');
        return redirect()->route('subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        Alert::error('Sub-Category Delete');
        return redirect()->route('subcategory.index');
    }
}
