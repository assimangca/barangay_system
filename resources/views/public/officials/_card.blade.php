<div class="group relative flex flex-col items-center w-56 rounded-[2.5rem] border border-white/10 bg-white/5 p-6 backdrop-blur-md transition-all duration-500 hover:-translate-y-2 hover:bg-white/10 shadow-xl">
    
    <!-- Large Photo -->
    <div class="relative mb-6 h-36 w-36 shrink-0 overflow-hidden rounded-2xl border-2 border-blue-400/30">
        @if($official->image)
            <img src="{{ asset('storage/' . $official->image) }}" alt="{{ $official->name }}" class="h-full w-full object-cover">
        @else
            <div class="flex h-full w-full items-center justify-center bg-blue-900/50 text-4xl">👤</div>
        @endif
    </div>
    
    <!-- Text Section with Gap to prevent overlapping -->
    <div class="flex flex-col items-center gap-y-2 text-center w-full">
        <h3 class="text-sm font-black uppercase text-white leading-tight">
            {{ $official->name }}
        </h3>
        
        <p class="text-[9px] font-bold uppercase tracking-widest text-blue-400 leading-normal min-h-[2.2rem] flex items-center">
            {{ $official->position }}
        </p>
        
        <div class="mt-2 inline-block rounded-full bg-white/5 border border-white/10 px-4 py-1.5 text-[8px] font-extrabold text-slate-400">
            {{ $official->term_years }}
        </div>
    </div>
</div>