@extends('layouts.app')
@section('title', 'Edit Contact')
@section('content')
    <div class="max-w-md mx-auto my-8 p-6 bg-white rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-6">Edit Contact</h1>

        <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-semibold text-gray-700">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter Name" value="{{ old('name', $contact->name) }}" class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('name')
                    <div class="text-sm text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="phone" class="block text-sm font-semibold text-gray-700">Phone</label>
                <input type="text" name="phone" id="phone" placeholder="+90 xxx xxxxxxxx Phone" value="{{ old('phone', $contact->phone) }}" class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('phone')
                    <div class="text-sm text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 transition">Update Contact</button>
        </form>

        <div class="mt-4">
            <a href="{{ route('contacts.index') }}" class="text-blue-500 hover:text-blue-700">Back to List</a>
        </div>
    </div>
@endsection
