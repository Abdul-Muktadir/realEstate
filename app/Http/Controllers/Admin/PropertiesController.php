<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Property;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::orderBy('created_at', 'desc')->paginate(2);
        return view('properties.index')->with('properties', $properties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('properties.create');
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
            'name' => 'required',
            'address' => 'required',
            'price' => 'required',
            'property_image'=>'image|nullable|max:1999'
        ]);

        // Handle File uploud
        if ($request->hasFile('property_image')) {
            // Get file name with extention
            $fileNameWithExt = $request->file('property_image')->getClientOriginalName();
            // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extention = $request->file('property_image')->getClientOriginalExtension();
            // FileName To Store
            $fileNameToStore = $fileName.'_'.time().'.'.$extention;
            // Upload Image
            $path= $request->file('property_image')->storeAs('public/property_images', $fileNameToStore);
        }else {
            $fileNameToStore = 'noimage.jpg';
        }

        $properties = new Property;
            $properties->name = $request->input('name');
            $properties->address = $request->input('address');
            $properties->price = $request->input('price');
            $properties->vendor_id = auth()->guard('vendor')->user()->id;
            $properties->property_image = $fileNameToStore;
            $properties->save();

        return redirect('/vendors')->with('success', 'Post Created');
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
        $properties = Property::find($id);

        if(auth()->guard('vendor')->user()->id !== $properties->vendor_id){
            return redirect('/properties')->with('error', 'Unauthorize Page');
        }
        return view('properties.edit')->with('properties', $properties);
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
            'name' => 'required',
            'address' => 'required',
            'price' => 'required',
            'property_image'=>'image|nullable|max:1999'
        ]);

        // Handle File uploud
        if ($request->hasFile('property_image')) {
            // Get file name with extention
            $fileNameWithExt = $request->file('property_image')->getClientOriginalName();
            // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extention = $request->file('property_image')->getClientOriginalExtension();
            // FileName To Store
            $fileNameToStore = $fileName.'_'.time().'.'.$extention;
            // Upload Image
            $path= $request->file('property_image')->storeAs('public/property_images', $fileNameToStore);
        }

        $properties = Property::find($id);
            $properties->name = $request->input('name');
            $properties->address = $request->input('address');
            $properties->price = $request->input('price');
            $properties->vendor_id = auth()->guard('vendor')->user()->id;
            if ($request->hasFile('property_image')) {
                $properties->property_image = $fileNameToStore;
            }
            $properties->save();

        return redirect('/properties')->with('success', 'Property Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $properties = Property::find($id);

        if(auth()->guard('vendor')->user()->id !== $properties->vendor_id){
            return redirect('/properties')->with('error', 'Unauthorize Page');
        }

            if($properties->property_image != 'noimage.jpg'){
                Storage::delete('public/property_image'.$properties->property_image);
            }

            $properties->delete();

        return redirect('/properties')->with('success', 'Property Removeed');
    }
    
}
