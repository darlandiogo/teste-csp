<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$contacts = Contact::get();

        return 'all';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return 'view create contact';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $contact = new Contact;
        $contact->first_name = $request->first_name;
        $contact->last_name  = $request->last_name;
        $contact->email = $request->email;
        $contact = new Contact;
        $contact->phone = $request->phone;

        if($contact->save())
            return 'add contact with success';

        return 'failed to add the new contact ';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);

        if(!$contact)
            return  'err';

        return 'view edit contact';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, $id)
    {
        $contact =  Contact::find($id);
        if(!$contact)
            return  'err';

        $contact->first_name = $request->first_name;
        $contact->last_name  = $request->last_name;
        $contact->email = $request->email;
        $contact = new Contact;
        $contact->phone = $request->phone;

        if($contact->save())
            return 'edit contact with success';

        return 'failed to edit the contact ';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact =  Contact::find($id);
        if(!$contact)
            return  'err';

        if($contact->delete())
            return 'success';

        return 'err, try again';
    }
}
