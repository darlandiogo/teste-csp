<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Repositories\ContactRepository;
class ContactController extends Controller
{
    protected $contactRepository;

    /**
     * Initialize ContactController with ContactRepository
     * @return empty
     */
    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contacts = $this->contactRepository->all($request->only([
         'searchTerm'
        ]));

        return view('contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('contact.create_or_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $result = $this->contactRepository->create($request->only([
            'first_name', 'last_name', 'email', 'phone'
        ]));

        if($result)
            return redirect()->back()->with('success', 'Contato criado com sucesso.');

        return redirect()->back()->withErrors(['message' => 'Ocorreu um erro ao adicionar o novo contato.']);
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
        $contact = $this->contactRepository->getById($id);

        if(!$contact)
            return redirect()->back()->withErrors(['message' => 'Ocorreu um erro ao localizar o contato selecionado.']);

        return view('contact.create_or_edit', compact('contact'));
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
        $result = $this->contactRepository->edit($request->only([
            'first_name', 'last_name', 'email', 'phone'
        ]), $id);

        if($result)
            return redirect()->back()->with('success', 'Contato editado com sucesso.');

        return redirect()->back()->withErrors(['message' => 'Ocorreu um erro ao editar contato, tente novamente.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->contactRepository->getById($id);
        if($result)
            return redirect()->back()->with('success', 'Contato excluido com sucesso.');

        return redirect()->back()->withErrors(['message' => 'Ocorreu um erro ao excluir o contato, tente novamente.']);
    }
}
