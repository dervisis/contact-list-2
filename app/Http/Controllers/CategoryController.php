<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        $contacts = Contact::all();
        return view('categories.create', compact('contacts'));
    }

    public function store(Request $request)
    {
        // Create the category
        $category = Category::create([
            'name' => $request->input('name'),
            'contact_id' => $request->input('contact_id')
        ]);

        // Check if 'contact_id' is provided in the request data
        if ($request->has('contact_id')) {
            $category->contact()->associate($request->input('contact_id'));
            $category->save();
        }

        return redirect()->route('dashboard')->with('success', 'Category created successfully.');
    }
}
