<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach($officials as $official)
    <div class="bg-white/5 backdrop-blur-md border border-white/10 rounded-3xl overflow-hidden shadow-xl transition hover:-translate-y-2">
        <!-- Photo Area -->
        <div class="h-48 bg-blue-800/50 flex items-center justify-center">
            @if($official->image)
                <img src="{{ asset('storage/' . $official->image) }}" class="h-full w-full object-cover">
            @else
                <span class="text-5xl">👤</span>
            @endif
        </div>
        
        <!-- Info Area -->
        <div class="p-6 text-center">
            <h3 class="text-xl font-bold text-white">{{ $official->name }}</h3>
            <p class="text-blue-400 font-medium uppercase tracking-widest text-xs mt-1">
                {{ $official->position }}
            </p>
            <div class="mt-4 inline-block px-3 py-1 rounded-full bg-blue-500/20 border border-blue-400/30 text-[10px] text-blue-200">
                Term: {{ $official->term_years }}
            </div>
        </div>
    </div>
    @endforeach
</div>