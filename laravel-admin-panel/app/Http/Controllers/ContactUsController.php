<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $messages = ContactUs::all();
        return view('contact.index', compact('messages'));
    }

    public function show(ContactUs $contact)
    { 
        $message = $contact;
        return view('contact.show', compact('message'));
    }

    public function destroy(ContactUs $contact)
    {
        $contact->delete();
        return redirect()->route('contact.index')->with('warning', 'پیام ارتباط با ما با موفقیت حذف شد');
    }
}
