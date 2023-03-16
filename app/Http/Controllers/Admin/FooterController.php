<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
    public function index()
    {
        $footers = Footer::all();

        return view ("admin.footer.index", compact('footers'));
        
    }
    public function create()
    {
        return view('admin.footer.create');
    }
    public function store(Request $request ) 
    {    
        $footerData = $request->all();
        Footer::create($footerData);
        return redirect()->route('admin.footer.index')->with('messagecreate','');
    }
    public function edit(Footer $footer)
    {
       
        return view('admin.footer.edit', compact('footer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Footer $footer)
    {
        $blogData =Footer::where ('id','=',$request->id)->get();
        $footer->update($blogData);
        return redirect()->route('admin.footer.index',compact('footer'))->with('messageupdate','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Footer $footer)
    {
        $footer->delete();
        return redirect()->route('admin.footer.index')->with('messagedelete','');
    }

}

