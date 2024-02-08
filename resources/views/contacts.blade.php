@extends('dashboard')

@section('content')
    <div class="flex justify-between">
        <div class="w-1/2 h-24">
            @php $search = ''; $filters = []; $filters['name'] = ''; $name = ''; @endphp
            <form action="{{ route('contacts.search') }}" method="GET">
                <input type="text" name="query" placeholder="Αναζήτηση..." value="{{ $search }}">
                <button type="submit">Αναζήτηση</button>
            </form>
        </div>
        <div class="w-1/2 h-24">
            <form action="{{ route('contacts.filter') }}" method="GET">
                <div>
                    <label for="name">Name:</label>
                    @foreach ($contacts as $contact)
                        <input type="checkbox" name="name" value="{{ $contact->name }}" {{ $filters['name'] ? 'checked' : '' }}> {{ $contact->surname }}
                    @endforeach
                </div>
                <!-- Add more filter options for other criteria -->
                <button type="submit">Apply Filter</button>
            </form>
        </div>
    </div>

    

    @if (session('success'))
        <div class="bg-green-300 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    

    @if ($contacts->isEmpty())
        <p>No contacts found.</p>
    @else
    <div class="grid grid-cols-1 gap-4">
        @foreach ($contacts as $contact)
        <div class="bg-white shadow p-6 rounded-lg mb-4">
                    <p class="text-lg font-semibold"><i class="fas fa-user-tie text-gray-300"></i>{{ $contact->name }} {{ $contact->surname }}</p>
                    <div class="flex items-center mt-2">
                        <p class="text-gray-600 mr-2"><i class="fas fa-envelope text-gray-300"></i>{{ $contact->email }}</p>
                    </div>
                    <div class="flex items-center mt-2">
                        <p class="text-gray-600"><i class="fas fa-phone text-gray-300"></i>{{ $contact->tel }}</p>
                    </div>
                    <p class="mt-2 text-gray-600"><i class="fas fa-home"></i>{{ $contact->address }}</p>
                    
                    <div class="mt-4">
                        <a href="{{ route('contacts.edit', $contact) }}" class="bg-teal-500 hover:bg-teal-600 font-bold py-2 px-4 rounded inline-block">Επεξεργασία</a>
                        <form action="{{ route('contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Είστε σίγουροι;')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Διαγραφή</button>
                        </form>
                    </div>
                </div>
        @endforeach
    </div>
    @endif
@endsection