@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 py-8">

    <div class="max-w-lg mx-auto bg-white shadow rounded-lg p-6">

        <h2 class="text-2xl font-bold mb-6">
            Change Password
        </h2>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.password.update') }}">

            @csrf
            @method('PUT')

            {{-- Current Password --}}
            <div class="mb-4">

                <label class="block text-gray-700 font-medium mb-2">
                    Current Password
                </label>

                <input type="password"
                       name="current_password"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400"
                       required>

            </div>

            {{-- New Password --}}
            <div class="mb-4">

                <label class="block text-gray-700 font-medium mb-2">
                    New Password
                </label>

                <input type="password"
                       name="password"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400"
                       required>

            </div>

            {{-- Confirm Password --}}
            <div class="mb-6">

                <label class="block text-gray-700 font-medium mb-2">
                    Confirm Password
                </label>

                <input type="password"
                       name="password_confirmation"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400"
                       required>

            </div>

            {{-- Submit Button --}}
            <div>

                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">

                    Update Password

                </button>

            </div>

        </form>

    </div>

</div>

@endsection