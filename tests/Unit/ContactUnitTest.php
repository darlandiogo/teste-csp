<?php

namespace Tests\Unit;


use Tests\TestCase;
use App\Repositories\ContactRepository;
class ContactUnitTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_new_contact()
    {
        $contactRepository = new ContactRepository;

        $params = [
            'first_name' => 'Jose',
            'last_name' => 'dos Santos',
            'email' => 'jose@outlook.com',
            'phone' => '(21)9999-99999',
        ];

        $result = $contactRepository->create($params);
        $this->assertEquals(true, $result);
    }

    public function test_edit_new_contact()
    {
        $contactRepository = new ContactRepository;
        $contacts = $contactRepository->all(['search' => 'Jose dos Santos']);
        $contact  = $contacts[0];

        $params = [
            'first_name' => 'Jose',
            'last_name' => 'dos Santos',
            'email' => 'jose@outlook.com',
            'phone' => '(21)9999-99999',
        ];

        $result = $contactRepository->edit($params, $contact->id);
        $this->assertEquals(true, $result);
    }

    public function test_delete_new_contact()
    {
        $contactRepository = new ContactRepository;
        $contacts = $contactRepository->all(['search' => 'Jose dos Santos']);
        $contact  = $contacts[0];

        $result = $contactRepository->delete($contact->id);
        $this->assertEquals(true, $result);
    }

}
