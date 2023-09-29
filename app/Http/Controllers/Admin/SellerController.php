<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function sellerindex()
    {
        return view('seller.auth.login');
    }

    public function sellerlogin(Request $request)
    {
        $check = $request->all();
        if(Auth::guard('seller')->attempt(['email'=>$check['email'], 'password'=>$check['password']]))
        {
            return redirect()->route('seller.dashboard');
        }
        else{
            return back();
        }
    }

    public function sellerdashboard()
    {
        return view('seller.dashboard');

    }

    public function profile(Request $request)
    {
        return view('seller.seller_profile.profileupdate',[
            'seller' => $request->user(),
        ]);
    }



    public function update(Request $request, Seller $seller)
    {
        $seller->update([
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => now()
        ]);

        return back();
    }

    public function updatepassowrd(Request $request, Seller $seller)
    {
        $seller->update([
            'password' => $request->password,
            'updated_at' => now()
        ]);

        return back();
    }

    public function sellerlogout()
    {
        Auth::guard('seller')->logout();
        return redirect()->route('seller.login.page');
    }
}
