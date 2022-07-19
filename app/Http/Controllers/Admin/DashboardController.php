<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Property;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function vendorDashboard(){
        return view('vendors.dashboard');
    }

    public function getVendor(){
        return view('admin.registervendor');
    }

    public function postVendor(Request $request){
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'solicitor_name'=>'required',
            'solicitor_email'=>'required',
            'solicitor_phone'=>'required',
            'solicitor_address'=>'required',
            'vendor_image'=>'image|nullable|max:1999',
        ]);

        // Handle File uploud
        if ($request->hasFile('vendor_image')) {
            // Get file name with extention
            $fileNameWithExt = $request->file('vendor_image')->getClientOriginalName();
            // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extention = $request->file('vendor_image')->getClientOriginalExtension();
            // FileName To Store
            $fileNameToStore = $fileName.'_'.time().'.'.$extention;
            // Upload Image
            $path= $request->file('vendor_image')->storeAs('public/vendor_images', $fileNameToStore);
        }else {
            $fileNameToStore = 'noimage.jpg';
        }

        $vendor = new Vendor;
        $vendor->name = $request->input('name');
        $vendor->email = $request->input('email');
        $vendor->password = $request->input('password');
        $vendor->phone = $request->input('phone');
        $vendor->address = $request->input('address');
        $vendor->solicitor_name = $request->input('solicitor_name');
        $vendor->solicitor_email = $request->input('solicitor_email');
        $vendor->solicitor_phone = $request->input('solicitor_phone');
        $vendor->solicitor_address = $request->input('solicitor_address');
        $vendor->user_id = auth()->user()->id;
        $vendor->vendor_image = $fileNameToStore;
        $vendor->save();

        return redirect('/admin')->with('success', 'Vendor Created');
    }

    public function showVendor(){
        $vendors = Vendor::orderBy('created_at', 'desc')->paginate(2);
        return view('admin.show_vendor')->with('vendors', $vendors);
    }

    public function editVendor($id){
        
        $vendor = Vendor::find($id);

        if(auth()->user()->id !== $vendor->user_id){
            return redirect('/admin')->with('error', 'Unauthorize Page');
        }
        return view('admin.edit_vendor')->with('vendor', $vendor);
    
    }

    public function destroyVendor($id){

        $vendor = vendor::find($id);

        if(auth()->guard('vendor')->user()->id !== $vendor->vendor_id){
            return redirect('/properties')->with('error', 'Unauthorize Page');
        }

            if($vendor->vendor_image != 'noimage.jpg'){
                Storage::delete('public/property_image'.$vendor->vendor_image);
            }

            $vendor->delete();

        return redirect('/admin.show_vendor')->with('success', 'Property Removeed');
        
    }

    public function storeVendor(){
        return view('admin.add-vendor');
    }

    public function storeProperty(){
        return view('admin.add-vendor');
    }

    public function showProperty(){
        $properties = Property::orderBy('created_at', 'desc')->paginate(2);
        return view('admin.show_property')->with('properties', $properties);
    }

    public function editProperty(){
        return view('admin.edit_property');
    }

    public function updateVendor(){
        return view('admin.edit-vendor');
    }

    public function updateProperty(){
        return view('admin.edit-property');
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('getLogin')->with('success', 'You are successfully logout');
    }
}
