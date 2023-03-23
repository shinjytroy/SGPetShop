<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::all();
        return view('admin.brand.index', compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required',
            'description' => 'required',
        ]);
        $brandData = $request->all();
        $brandData['slug'] = \Str::slug($request->brand_name);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg' && $extension != 'webp' && $extension != 'jfif') {
                return view('admin.brand.create')
                    ->with('loi', 'You can only select files with the extension: jpg ,png, jpeg, webp, jfif ');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("images", $imageName);
        } else {
            $imageName = null;
        }
        $brandData['brand_image_path'] = $imageName;

        Brand::create($brandData);
        return redirect()->route('admin.brand.index')->with('messagecreate','');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'brand_name' => 'required',
            'description' => 'required',
        ]);
        $brandData = $request->all();
        $brandData['slug'] = \Str::slug($request->brand_name);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg' && $extension != 'webp' && $extension != 'jfif') {
                return view('admin.brand.create')
                    ->with('loi', 'You can only select files with the extension: jpg ,png, jpeg, webp, jfif ');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("images", $imageName);
            $brandData['brand_image_path'] = $imageName;
        } else {
            $imageName = null;
        }

        $brand->update($brandData);
        return redirect()->route('admin.brand.index')->with('messageupdate','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('admin.brand.index')->with('messagedelete','');
    }
}
