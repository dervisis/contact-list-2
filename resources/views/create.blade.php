@extends('dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Add New Contact</h1>

    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold">Όνομα:</label>
            <input type="text" name="name" id="name" class="form-input mt-1 block w-full" required>
        </div>
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold">Επώνυμο:</label>
            <input type="text" name="surname" id="surname" class="form-input mt-1 block w-full" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold">Email:</label>
            <input type="email" name="email" id="email" class="form-input mt-1 block w-full" required>
        </div>
        <div class="mb-4">
            <label for="tel" class="block text-gray-700 font-bold">Τηλεφωνο:</label>
            <input type="text" name="tel" id="tel" class="form-input mt-1 block w-full" required>
        </div>
        <div class="mb-4">
            <label for="address" class="block text-gray-700 font-bold">Διεύθυνση:</label>
            <textarea name="address" id="messaddressage" class="form-textarea mt-1 block w-full" rows="3" required></textarea>
        </div>
        <div class="mt-6">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">Submit</button>
        </div>
    </form>
@endsection