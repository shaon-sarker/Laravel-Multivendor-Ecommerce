<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email'=>$check['email'], 'password'=>$check['password']]))
        {
            return redirect()->route('admin.dashboard');
        }
        else{
            return back();
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function profile(Request $request)
    {

        return view('admin.admin_profile.profileupdate',[
            'admin' => $request->user(),
        ]);
    }

    public function update(Request $request, Admin $admin)
    {
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => now()
        ]);

        return back();
    }

    public function updatepassowrd(Request $request, Admin $admin)
    {
        $admin->update([
            'password' => $request->password,
            'updated_at' => now()
        ]);

        return back();
    }

    public function adminlogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login.page');
    }

  

   

   



   
}
