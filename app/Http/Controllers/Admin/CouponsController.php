<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index(){
        $coupons = Coupon::all();
        return view('admin.coupons.index', compact('coupons'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *@param \App\Model\Coupon $coupon
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Coupon $coupon)
    {
        $coupon = $request->all();
        Coupon::create($coupon);
        return redirect()->route('admin.coupons.index', compact('coupon'));
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
     * @param  App\Model\Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Model\Coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        $coupons = $request->all();
        $coupon->update($coupons);
        return redirect()->route('admin.coupons.index', compact('coupon'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\models\Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $coupon -> delete();
        return redirect()->route('admin.coupons.index');

    }
}
