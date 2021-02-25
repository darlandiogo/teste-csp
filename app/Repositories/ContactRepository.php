<?php

namespace App\Repositories;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactRepository implements Repository
{
    public function all($params = [])
    {
        $query = DB::table('contacts')->where('contacts.deleted_at', null);

        if(isset($params['search']))
            $query->where(DB::raw("CONCAT(contacts.first_name,' ', contacts.last_name)"), 'like', '%' . $params['search'] . '%');

        return $query->paginate(5);
    }

    public function getById($id)
    {
        return  Contact::find($id);
    }

    public function create($input)
    {
        $contact = new Contact;
        $contact->first_name = $input['first_name'];
        $contact->last_name  = $input['last_name'];
        $contact->email = $input['email'];
        $contact->phone = $input['phone'];

        if($contact->save())
            return  true;

        return false;

    }

    public function edit($input, $id)
    {
        $contact = $this->getById($id);
        if(!$contact)
            return  false;

        $contact->first_name = $input['first_name'];
        $contact->last_name  = $input['last_name'];
        $contact->email = $input['email'];
        $contact->phone = $input['phone'];

        if($contact->save())
            return true;

        return false;
    }

    public function delete($id)
    {
        $contact = $this->getById($id);
        if(!$contact)
            return  false;

        if($contact->delete())
            return true;

        return false;
    }
}
