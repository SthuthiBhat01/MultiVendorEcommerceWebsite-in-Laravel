<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\validator;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function contact_store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'contact_email' => 'required|email',
        'contact_name' => 'required',
        'contact_message' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    } else {
        $data = [
            'name' => $request->contact_name,
            'email' => $request->contact_email,
            'message' => $request->contact_message,
        ];
        
        $contact = Contact::create($data);
        
        if ($contact) {
            return redirect('/contactus');
        }
    }
}


    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        $data['contacts']=Contact::paginate(10);
        return view('adminfrontend.contacts',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
