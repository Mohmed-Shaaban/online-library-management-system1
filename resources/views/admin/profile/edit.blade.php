@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4">Edit Profile</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.profile.update') }}" method="POST">
        @csrf

        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="border rounded w-full mb-3">

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="border rounded w-full mb-3">

        <label>Password (leave blank to keep current):</label>
        <input type="password" name="password" class="border rounded w-full mb-3">

        <label>Confirm Password:</label>
        <input type="password" name="password_confirmation" class="border rounded w-full mb-3">

        <button class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
