<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;


class ContactController extends Controller
{
    public function index( )
    {
        $contacts = Contact::all();
       
        return view ('admin.contact.index' , compact('contacts'));

    }
    public function view (Request $request ,  $id )
    {
       
        $user = User::all();
        $contact = Contact::where('id','=',$id)->get();
        return view('admin.contact.view', compact('user', 'contact'));
    }

    public function send (Request $request ,  $id )
    {
       
        $user = User::all();
        $contact = Contact::where('id','=',$id)->get();
        return view('admin.send.view', compact('user', 'contact'));
    }
    public function create()
    {
        return view('admin.contact.create');
    }
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contact.index')->with('messagedelete','');
    }
}
