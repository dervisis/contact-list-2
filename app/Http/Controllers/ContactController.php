<?php

namespace App\Http\Controllers;
use App\Models\Contact;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts', compact('contacts'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tel' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        Contact::create($validatedData);

        return redirect()->route('dashboard')->with('success', 'Contact created successfully.');
    }

    public function edit(Contact $contact)
    {
        return view('edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tel' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        $contact->update($validatedData);

        return redirect()->route('dashboard')->with('success', 'Contact updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('dashboard')->with('success', 'Contact deleted successfully.');
    }

    public function search(Request $request)
    {
        $search = $request->input('query');

        $contacts = Contact::where('name', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%")
                        ->orWhere('surname', 'like', "%$search%")
                        ->orWhere('tel', 'like', "%$search%")
                        ->orWhere('address', 'like', "%$search%")
                        ->get();
        //dd($search);
        
        return view('sresults', compact('contacts', 'search'));
    }

    public function filter(Request $request)
    {
        $query = Contact::query();

        // Initialize filters array
        $filters = [
            'name' => false,
            // Add more filters for other criteria
        ];

        // Check which filters are selected
        foreach ($filters as $key => $value) {
            if ($request->has($key)) {
                $filters[$key] = true;
            }
        }

        // Apply filters
        if ($filters['name']) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }
        // Add more filters for other criteria as needed

        $contacts = $query->get();

        return view('fresults', compact('contacts', 'filters'));
    }
}
