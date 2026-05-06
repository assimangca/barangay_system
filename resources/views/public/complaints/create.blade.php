<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Complaint — Barangay System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

<nav class="bg-blue-900 text-white px-6 py-4 flex items-center justify-between">
    <a href="{{ route('home') }}" class="text-lg font-bold">Barangay System</a>
    <div class="flex gap-4 text-sm">
        <a href="{{ route('projects.index') }}" class="hover:underline">Projects</a>
        <a href="{{ route('complaints.create') }}" class="underline">Submit Complaint</a>
        <a href="{{ route('complaints.track') }}" class="hover:underline">Track Complaint</a>
    </div>
</nav>

<div class="max-w-2xl mx-auto px-6 py-8">
    <div class="bg-white rounded-xl border border-gray-200 p-6">

        <h1 class="text-xl font-bold text-gray-800 mb-1">Submit a Complaint or Report</h1>
        <p class="text-sm text-gray-500 mb-6">
            You will receive a tracking number after submission to monitor your complaint.
        </p>

        {{-- Success --}}
        @if(session('success'))
        <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
            <p class="text-green-800 font-medium text-sm">{{ session('success') }}</p>
            @if(session('tracking_number'))
            <p class="text-green-700 text-sm mt-2">
                Your tracking number:
                <strong class="font-mono text-lg">{{ session('tracking_number') }}</strong>
            </p>
            <p class="text-green-600 text-xs mt-1">Please save this number to track your complaint.</p>
            @endif
        </div>
        @endif

        <form method="POST" action="{{ route('complaints.store') }}"
              enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div class="grid grid-cols-2 gap-5">
                {{-- Name --}}
                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Your Name *</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm
                                  focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                {{-- Type --}}
                <div class="col-span-2 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Type *</label>
                    <select name="type" required
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm
                                   focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="complaint" {{ old('type') === 'complaint'  ? 'selected' : '' }}>Complaint</option>
                        <option value="report"    {{ old('type') === 'report'     ? 'selected' : '' }}>Report</option>
                        <option value="suggestion"{{ old('type') === 'suggestion' ? 'selected' : '' }}>Suggestion</option>
                    </select>
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Email <span class="text-gray-400">(optional)</span>
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm
                                  focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                {{-- Phone --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Phone <span class="text-gray-400">(optional)</span>
                    </label>
                    <input type="text" name="phone" value="{{ old('phone') }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm
                                  focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            {{-- Subject --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Subject *</label>
                <input type="text" name="subject" value="{{ old('subject') }}" required
                       placeholder="Brief description of your complaint..."
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm
                              focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('subject')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Related Project --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Related Project <span class="text-gray-400">(optional)</span>
                </label>
                <select name="project_id"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm
                               focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Not related to a specific project</option>
                    @foreach($projects as $project)
                    <option value="{{ $project->id }}"
                        {{ old('project_id') == $project->id ? 'selected' : '' }}>
                        {{ $project->title }}
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Description *</label>
                <textarea name="description" rows="5" required
                          placeholder="Provide full details of your complaint or report..."
                          class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm
                                 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
                @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Attachment --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Attachment <span class="text-gray-400">(optional)</span>
                </label>
                <input type="file" name="attachment" accept=".jpg,.jpeg,.png,.pdf"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm">
                <p class="text-xs text-gray-400 mt-1">JPG, PNG or PDF. Max 2MB.</p>
            </div>

            <button type="submit"
                    class="w-full bg-blue-700 hover:bg-blue-800 text-white font-medium
                           py-3 rounded-lg text-sm">
                Submit Complaint
            </button>
        </form>
    </div>
</div>

</body>
</html>