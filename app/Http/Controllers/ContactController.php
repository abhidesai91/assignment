<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => ['required', 'regex:/^\+\d{1,2}\s\d{3}\s\d{7}$/']

        ]);

        Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        return redirect()->route('contacts.index')->with('success', 'Contact created successfully!');
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => ['required', 'regex:/^\+\d{1,2}\s\d{3}\s\d{7}$/']

        ]);
        $contact = Contact::findOrFail($id);
        $contact->update([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);
        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully!');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully!');
    }

    public function importXML(Request $request)
    {
        $request->validate([
            'xml_file' => 'required|file|mimes:xml',
        ]);
        $xml = simplexml_load_file($request->file('xml_file'));
        // dd($xml->contact);
        foreach ($xml->contact as $contactData) {
            if($contactData->name && $contactData->phone){
                Contact::create([
                    'name' => (string) $contactData->name,
                    'phone' => (string) $contactData->phone,
                ]);
            } else {
                return redirect()->route('contacts.index')->with('error', 'Name and phone not found!');
            }

        }
        return redirect()->route('contacts.index')->with('success', 'Contact imported successfully!');
    }
}
