<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //recuperamos los contactos de la bd
        $contacts=Contact::paginate(3);
        return view('contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //abrimos el formulario
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        //
        $contact = new Contact;
        $contact->nombre=$request->nombre;
        $contact->telefono=$request->telefono;

        $contact->save();

        return redirect()->route('contacts.index')
              ->with('mensaje','El contacto fue guardado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //recuperamos el contacto con un id determinado
        $contact = Contact::find($id);
        return view('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $contact = Contact::find($id);
        return view('contact.edit', compact('contact'));
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
        //
        $contact = Contact::find($id);
        $contact->nombre=$request->nombre;
        $contact->telefono=$request->telefono;
        $contact->save();

        return redirect()->route('contacts.index')
              ->with('mensaje','El contacto fue actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //eliminamos el contacto con el id determinado
        $contact = Contact::find($id);
        $contact->delete();
        return back()->with('mensaje','¡El contacto fue eliminado!');
    }
    public function pdf(){
        $pdf=PDF::loadView('contacts.pdf');
        return $pdf->stream('descarga.pdf');
    }
}
