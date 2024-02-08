@extends('dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Edit Contact</h1>

    <form action="{{ route('contacts.update', $contact) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold">Όνομα</label>
            <input type="text" name="name" id="name" class="form-input mt-1 block w-full" value="{{ old('name', $contact->name) }}" required>
        </div>
        <div class="mb-4">
            <label for="surname" class="block text-gray-700 font-bold">Επώνυμο</label>
            <input type="text" name="surname" id="surname" class="form-input mt-1 block w-full" value="{{ old('surname', $contact->surname) }}" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold">Email</label>
            <input type="email" name="email" id="email" class="form-input mt-1 block w-full" value="{{ old('email', $contact->email) }}" required>
        </div>
        <div class="mb-4">
            <label for="tel" class="block text-gray-700 font-bold">Τηλέφωνο</label>
            <input type="text" name="tel" id="tel" class="form-input mt-1 block w-full" value="{{ old('tel', $contact->tel) }}" required>
        </div>
        <div class="mb-4">
            <label for="address" class="block text-gray-700 font-bold">Διεύθυνση</label>
            <textarea name="address" id="address" class="form-textarea mt-1 block w-full" rows="3" required>{{ old('address', $contact->address) }}</textarea>
        </div>
        <div class="mt-6">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">Update</button>
        </div>
    </form>
@endsection