<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ord = OrderDetail::all();
        return view('admin.orderdetail.index', compact('ord'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('admin.OrderDetail.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $prodData = $request->all();
    //     $prodData['slug'] = \Str::slug($request->name);
    //     // process upload

    //     if($request->hasFile('photo'))
    //     {
    //         $file=$request->file('photo');
    //         $extension = $file->getClientOriginalExtension();
    //         if($extension != 'jpg' && $extension != 'png' && $extension !='jpeg')
    //         {
    //             return view('admin.OrderDetail.create')
    //                 ->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
    //         }
    //         $imageName = $file->getClientOriginalName();
    //         $file->move("images",$imageName);
    //     }
    //     else
    //     {
    //         $imageName = null;
    //     }
    //     $prodData['image'] = $imageName;
        
    //     OrderDetail::create($prodData);
    //     return redirect()->route('admin.OrderDetail.index');
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\OrderDetail  $OrderDetail
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(OrderDetail $OrderDetail)
    // {
        
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\OrderDetail  $OrderDetail
    //  * @return \Illuminate\Http\Response
    //  */
    public function edit(OrderDetail $OrderDetail)
    {
        // return view('admin.orderdetail.edit', compact('OrderDetail'));
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\OrderDetail  $OrderDetail
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(Request $request, OrderDetail $OrderDetail)
    {
        $OrderDetail->update($request->all());
        return redirect()->route('admin.orderdetail.index');
    }


    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\OrderDetail  $OrderDetail
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(OrderDetail $OrderDetail)
    // {
    //     $OrderDetail->delete();
    //     return redirect()->route('admin.OrderDetail.index');
    // }

}
