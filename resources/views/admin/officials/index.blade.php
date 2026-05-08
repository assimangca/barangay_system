@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Barangay Officials</h2>
        <a href="{{ route('admin.officials.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition shadow-md">
            + Add Official
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600">Photo</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600">Name</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600">Position</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600">Priority</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-600 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($officials as $official)
                <tr class="hover:bg-gray-50/50 transition">
                    <td class="px-6 py-4">
                        @if($official->image)
                            <img src="{{ asset('storage/' . $official->image) }}" class="h-10 w-10 rounded-full object-cover border shadow-sm">
                        @else
                            <div class="h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 border border-dashed border-gray-300">👤</div>
                        @endif
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-800">{{ $official->name }}</td>
                    <td class="px-6 py-4 text-gray-600 font-medium">{{ $official->position }}</td>
                    <td class="px-6 py-4 text-gray-500">
                        <span class="bg-gray-100 px-2 py-1 rounded text-xs">Rank: {{ $official->order_priority }}</span>
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.officials.edit', $official) }}" class="inline-flex items-center px-3 py-1 bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white rounded-md transition-colors text-sm font-medium border border-blue-100">
                            Edit
                        </a>
                        
                        <!-- DESIGNED DELETE BUTTON -->
                        <button type="button" 
                                onclick="openDeleteModal('{{ route('admin.officials.destroy', $official) }}', '{{ $official->name }}')" 
                                class="inline-flex items-center px-3 py-1 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded-md transition-colors text-sm font-medium border border-red-100">
                            Delete
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-10 text-center text-gray-400 italic font-light">No officials found. Add one to get started.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- DESIGNED DELETE MODAL (HIDDEN BY DEFAULT) -->
<div id="deleteModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
    <!-- Dark Backdrop -->
    <div class="absolute inset-0 bg-gray-900/60 backdrop-blur-sm" onclick="closeDeleteModal()"></div>
    
    <!-- Modal Content -->
    <div class="relative bg-white rounded-2xl shadow-2xl max-w-sm w-full p-8 text-center animate-in fade-in zoom-in duration-200">
        <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-red-100 mb-6">
            <svg class="h-10 w-10 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </div>
        
        <h3 class="text-xl font-bold text-gray-900 mb-2">Confirm Delete?</h3>
        <p class="text-gray-500 mb-8 leading-relaxed">
            Are you sure you want to delete <span id="deleteOfficialName" class="font-bold text-gray-800"></span>? This action cannot be reversed.
        </p>
        
        <div class="flex gap-3">
            <button type="button" onclick="closeDeleteModal()" class="flex-1 px-4 py-2.5 bg-gray-100 text-gray-700 rounded-xl font-bold hover:bg-gray-200 transition">
                Cancel
            </button>
            <form id="deleteForm" method="POST" class="flex-1">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full px-4 py-2.5 bg-red-600 text-white rounded-xl font-bold hover:bg-red-700 shadow-lg shadow-red-200 transition">
                    Yes, Delete
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function openDeleteModal(url, name) {
        document.getElementById('deleteForm').action = url;
        document.getElementById('deleteOfficialName').innerText = name;
        document.getElementById('deleteModal').classList.replace('hidden', 'flex');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.replace('flex', 'hidden');
    }
</script>
@endsection