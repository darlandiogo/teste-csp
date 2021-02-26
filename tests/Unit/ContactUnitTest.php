<?php

namespace Tests\Unit;


use Tests\TestCase;
use App\Models\Contact;
class ContactUnitTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_new_contact()
    {
        $contact = new Contact;
        $contact->first_name = 'Jose';
        $contact->last_name  = 'dos Santos';
        $contact->email = 'jose@outlook.com';
        $contact->phone = '(21)9999-99999';
        $result = $contact->save();
        $this->assertEquals(true, $result);
    }

}
