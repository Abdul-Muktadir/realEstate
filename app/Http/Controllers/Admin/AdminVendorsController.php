<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Vendor;

class AdminVendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::orderBy('created_at', 'desc')->paginate(2);
        return view('admin.vendors.index')->with('vendors', $vendors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vendors.create');
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
        $vendor->password = bcrypt($request->input('password'));
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
        $vendor = Vendor::find($id);

        if(auth()->user()->id !== $vendor->user_id){
            return redirect('/adminvendors')->with('error', 'Unauthorize Page');
        }
        return view('/admin.vendors.edit')->with('vendor', $vendor);
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

        $vendor = Vendor::find($id);
        $vendor->name = $request->input('name');
        $vendor->email = $request->input('email');
        $vendor->password = bcrypt($request->input('password'));
        $vendor->phone = $request->input('phone');
        $vendor->address = $request->input('address');
        $vendor->solicitor_name = $request->input('solicitor_name');
        $vendor->solicitor_email = $request->input('solicitor_email');
        $vendor->solicitor_phone = $request->input('solicitor_phone');
        $vendor->solicitor_address = $request->input('solicitor_address');
        $vendor->user_id = auth()->user()->id;
        // if ($request->hasFile('vendor_image')) {
        $vendor->vendor_image = $fileNameToStore;
        // }
        $vendor->save();

        return redirect('/adminvendors')->with('success', 'Vendor Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendor = Vendor::find($id);

        if(auth()->user()->id !== $vendor->user_id){
            return redirect('/adminvendors')->with('error', 'Unauthorize Page');
        }

            if($vendor->vendor_image != 'noimage.jpg'){
                Storage::delete('public/vendor_image'.$vendor->vendor_image);
            }

            $vendor->delete();

        return redirect('/adminvendors')->with('success', 'Property Removeed');
    }
}
