<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //save data to database
    public function addContact(Request $req){
        $contact=new Contact();
        $contact->name=$req->name;
        $contact->surname=$req->surname;
        $contact->gender=$req->gender;
        $contact->jobTitle=$req->jobTitle;
        $contact->company=$req->company;
        $contact->email=$req->email;
        $contact->phone=$req->phone;
        $contact->notes=$req->notes;
        $contact->save();

    }
    public function getContacts(){
        $contacts=Contact::all();
        // return $contacts;
        return response()->json([
            'contacts'=>$contacts
        ]);


    }
}
