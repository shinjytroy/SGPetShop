<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;
class FooterController extends Controller
{
    public function index ()
    {
        $footer = Footer::all();
        return view ('admin.footer.index',compact('footer'));

    }
    public function edit(Footer $footer)
    {
        return view('admin.footer.edit', compact('footer'));
    }
    public function update(Request $request, Footer $footer)
    {
        $footerData = $request->all(); 
        $footer->update($footerData);
        return redirect()->route('admin.footer.index')->with('messageupdate','');
    }

}
