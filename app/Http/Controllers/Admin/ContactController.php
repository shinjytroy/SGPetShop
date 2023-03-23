<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use Mail;


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


    public function create()
    {
        return view('admin.contact.create');
    }
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contact.index')->with('messagedelete','');
    }
    public function sendMail (Request $request ,  $id)
    {
        $user = User::all();
        $contact = Contact::where('id','=',$id)->first();
       
        return view('admin.contact.sendMail', compact('user', 'contact'));
    }

    public function process(Request $request)

    {
        $emailCOntact = $request->email ; 
        $body = $request->body;
        Mail::send('',compact ('body'),
        function($email) use($emailCOntact){
            $email->subject('hi');
            $email->to('emailContact');

        });
        return redirect()->route('admin.contact.index')->with('messageHasSend','');
    }

  
    
}
