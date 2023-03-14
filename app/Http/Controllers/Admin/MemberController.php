<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Membership;

class MemberController extends Controller
{
    public function index()
    {
        $mems = Membership::all();

        return view ("admin.member.index", compact('mems'));
        
    }
    public function create()
    {
        return view('admin.member.create');
    }
    public function store(Request $request ) 
    {
        $memData = $request->all();

     

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
        $memData['image'] = $imageName;

        Membership::create($memData);
        return redirect()->route('admin.member.index')->with('messagecreate','');
    }
    public function edit(Membership $member)
    {
        return view('admin.member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membership $member)
    {
        $memData = $request->all(); 
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg' && $extension != 'webp' && $extension != 'jfif') {
                return view('admin.member.create')
                    ->with('loi', 'You can only select files with the extension: jpg ,png, jpeg, webp, jfif ');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("images", $imageName);
            $memData['image'] = $imageName;
        } else {
            $imageName = null;
        }

        $member->update($memData);
        return redirect()->route('admin.member.index')->with('messageupdate','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membership $member)
    {
        $member->delete();
        return redirect()->route('admin.member.index')->with('messagedelete','');
    }

}
