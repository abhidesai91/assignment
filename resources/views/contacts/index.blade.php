@extends('layouts.app')
@section('title', 'Contacts List')
@section('content')
    <div class="max-w-4xl mx-auto my-8 p-6 bg-white rounded-lg shadow-lg">
        <div class="mb-2 flex justify-between items-center">
            <h1 class="text-3xl font-bold mb-6">Contacts</h1>
            <a href="{{ route('contacts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 transition">Add New Contact</a>
        </div>
        <div class="mb-4 flex justify-between items-center">
            <div>
            </div>
            <form action="{{ route('contacts.import') }}" method="POST" enctype="multipart/form-data" class="flex items-center space-x-4">
                @csrf
                <input type="file" name="xml_file" class="">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-600 transition">Import Contacts from XML</button>
            </form>
        </div>

        <table class="min-w-full table-auto border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-50 border-b">
                    <th class="px-4 py-2 text-left">Name</th>
                    <th class="px-4 py-2 text-left">Phone</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                        <td class="px-4 py-2">{{ $contact->name }}</td>
                        <td class="px-4 py-2">{{ $contact->phone }}</td>
                        <td class="px-4 py-2 text-left space-x-2">
                            <a href="{{ route('contacts.edit', $contact->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
