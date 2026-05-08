@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-md overflow-hidden">
        <div class="p-8">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Edit Barangay Official</h2>
                <a href="{{ route('admin.officials.index') }}" class="text-blue-600 hover:underline">← Back to List</a>
            </div>

            <form action="{{ route('admin.officials.update', $official) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                        <input type="text" name="name" value="{{ $official->name }}" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Position</label>
                        <input type="text" name="position" value="{{ $official->position }}" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Term Years</label>
                        <input type="text" name="term_years" value="{{ $official->term_years }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                        <input type="number" name="order_priority" value="{{ $official->order_priority }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Official Photo (Leave blank to keep current)</label>
                    @if($official->image)
                        <div class="mb-4">
                            <p class="text-xs text-gray-500 mb-1">Current Photo:</p>
                            <img src="{{ asset('storage/' . $official->image) }}" class="h-20 w-20 rounded-lg object-cover border">
                        </div>
                    @endif
                    <input type="file" name="image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-bold hover:bg-blue-700 transition shadow-lg">
                        Update Official Information
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection