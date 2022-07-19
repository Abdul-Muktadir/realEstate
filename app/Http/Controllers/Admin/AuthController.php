<?php

namespace App\Http\Controllers\Admin;
use App\Models\Vendor;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin(){
        return view('admin.auth.login');
    }

    public function postLogin(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $validated= auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ]);

        if ($validated) {
            return redirect('/admin')->with('success', 'Loged in Successfully');
            // return redirect()->route('')->with('success', 'Loged in Successfully');
        }else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }

    public function getVendorLogin(){
        return view('vendors.auth.login');
    }

    public function postVendorLogin(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $validated= auth()->guard('vendor')->attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ]);

        // Auth::guard('vendor')->attempt($request->only('email', 'password'));

        if ($validated) {
            return redirect('/vendors')->with('success', 'Loged in Successfully');
            // return redirect()->route('')->with('success', 'Loged in Successfully');
        }else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }

    public function vendorLogout(){
        auth()->guard('vendor')->logout();
        return redirect()->route('getVendorLogin')->with('success', 'You are successfully logout');
    }
}
