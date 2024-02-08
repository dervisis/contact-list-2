@extends('dashboard')

@section('content')

<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Category Name:</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div>
        <label for="contact_id">Select Contacts:</label>
        <select name="contact_id" id="contact_id" required>
            @foreach($contacts as $contact)
                <option value="{{ $contact->id }}">{{ $contact->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="bg-teal-500">Create Category</button>
</form>

@endsection