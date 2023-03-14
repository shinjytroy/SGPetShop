<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;

class InformationController extends Controller
{
    public function index()
    {
        $infors =Information::all();

        return view ("admin.information.index", compact('infors'));
        
    }
    public function create()
    {
        return view('admin.information.create');
    }
    public function store(Request $request ) 
    {
        $request->validate([
            'title' => 'required|min:3|max:50',
                     
            'content' => 'required|min:3|max:200',          
        ]); 
        $inforData = $request->all();
        Information::create($inforData);
        return redirect()->route('admin.information.index')->with('messagecreate','');
    }
    public function edit(Information $infor)
    {
        return view('admin.information.edit', compact('infor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Information $infor)
    {
        $inforData = $request->all(); 
        $infor->update($inforData = $request->all() );
        return redirect()->route('admin.information.index')->with('messageupdate','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $infor)
    {
        $infor->delete();
        return redirect()->route('admin.information.index')->with('messagedelete','');
    }

}

