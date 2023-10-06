<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImage;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Facades\Image as Image;


class ProductController extends Controller
{

    public function index()
    {
        $products = Product::select(['id','product_name','product_image','product_qty','selling_price','discount_price','status'])->latest()->get();
        return view('admin.pages.product.index',compact('products'));
    }


    public function create()
    {
        $brands = Brand::select(['id','brand_name'])->get();
        $categorys = Category::select(['id','category_name'])->get();
        $sub_categorys = Subcategory::select(['id','subcategory_name'])->get();
        return view('admin.pages.product.create',compact('brands','categorys','sub_categorys'));
    }

    public function store(Request $request)
    {
        $image = $request->file('product_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('uploads/product/productimage/'.$name_gen);
        $save_url = $name_gen;

        $product_id = Product::insertGetId([

            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),

            'product_sku' => $request->product_sku,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,

            'selling_price' => $request->selling_price,
            'buying_price' => $request->buying_price,
            'discount_price' => $request->discount_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp, 

            'product_features' => $request->product_features,
            'product_item_tags' => $request->product_item_tags, 

            'product_image' => $save_url,
            // 'seller_id ' => $request->seller_id,
            'status' => 1,
            'created_at' => Carbon::now(), 

        ]);

        /// Multiple Image Upload From her //////

        $images = $request->file('photo_name');
        foreach($images as $img)
        {
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(800,800)->save('uploads/product/multiimage/'.$make_name);
            $uploadPath = $make_name;


            MultiImage::insert([
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(), 
            ]); 
        } // end foreach

        /// End Multiple Image Upload From her //////
        Alert::success('Product Added Successfully');
        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $multi_images = MultiImage::where('product_id',$id)->get();
        // $active_vendor = Seller::where('status',1)->latest()->get();
        $brands = Brand::select(['id','brand_name'])->get();
        $categorys = Category::select(['id','category_name'])->get();
        $sub_categorys = Subcategory::select(['id','subcategory_name'])->get();
        $products = Product::findOrFail($id);
        return view('admin.pages.product.edit',compact('brands','categorys','sub_categorys','multi_images','products'));
    }

    public function update(Request $request)
    {
        $product_id = $request->id;

        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),

            'product_sku' => $request->product_sku,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,

            'selling_price' => $request->selling_price,
            'buying_price' => $request->buying_price,
            'discount_price' => $request->discount_price,

            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp, 

            'product_features' => $request->product_features,
            'product_item_tags' => $request->product_item_tags, 

            // 'seller_id ' => $request->seller_id,
            'status' => 1,
            'updated_at' => Carbon::now(), 
        ]);

        Alert::info('Product Updated');
        return redirect()->route('product.index');

    }


    public function updateproductimage(Request $request)
    {
        $pro_id = $request->id;
        $oldImage =  'uploads/product/productimage/'.$request->old_img;

        $image = $request->file('product_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('uploads/product/productimage/'.$name_gen);
        $save_url = $name_gen;

         if (File::exists($oldImage)) {
            File::delete($oldImage);
        }

        Product::findOrFail($pro_id)->update([

            'product_image' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        Alert::info('Product Image Updated');
        return redirect()->route('product.index');
    }

    public function updateproductmultiimage(Request $request)
    {
        $imgs = $request->multi_img;

        foreach($imgs as $id => $img ){
            $imgDel = MultiImage::findOrFail($id);
            $old_image = $imgDel->photo_name;
            $delete_path = public_path() . '/uploads/product/multiimage/'.$old_image;
            unlink($delete_path);

        $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(800,800)->save('uploads/product/multiimage/'.$make_name);
        $uploadPath = $make_name;

        MultiImage::where('id',$id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),
        ]); 
        } // end foreach

        Alert::info('Product Image Updated');
        return redirect()->route('product.index');
    }

    public function MulitImageDelelte($id)
    {
        $oldImg = MultiImage::findOrFail($id);
        $old_image = $oldImg->photo_name;
        $delete_path = public_path() . '/uploads/product/multiimage/'.$old_image;
        unlink($delete_path);
        MultiImage::findOrFail($id)->delete();

        Alert::error('Product Deleted');
        return redirect()->route('product.index');
    }

    public function ProductInactive($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);
        Alert::success('Product Inactive');
        return redirect()->route('product.index');
    }

    public function ProductActive($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);
        Alert::success('Product active');
        return redirect()->route('product.index');
    }

    public function ProductDelete($id)
    {
        $product = Product::findOrFail($id);
        $old_image = $product->product_image;
        $delete_path = public_path() . '/uploads/product/productimage/'.$old_image;
        unlink($delete_path);
        Product::findOrFail($id)->delete();
    
        $imges = MultiImage::where('product_id',$id)->get();
        foreach($imges as $img){
            $old_image = $img->photo_name;
            $delete_path = public_path() . '/uploads/product/multiimage/'.$old_image;
            unlink($delete_path);
            MultiImage::where('product_id',$id)->delete();
        }

        Alert::error('Product Deleted');
        return redirect()->route('product.index');
    }

    

}
