@extends('layouts.app')

@section('content')
<div class="w-full flex flex-col items-center">
    
    <!-- BACK TO HOMEPAGE -->
    <div class="mb-10">
        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 border border-white/20 bg-white/10 hover:bg-white/20 text-white font-medium px-8 py-3 rounded-full text-sm transition shadow-sm active:scale-95">
            ← Back to Homepage
        </a>
    </div>

    <!-- TITLES -->
    <div class="text-center mb-16">
        <h2 class="text-4xl font-black uppercase tracking-[0.2em] md:text-5xl text-white">Organizational Chart</h2>
        <p class="mt-4 text-sm font-bold uppercase tracking-[0.4em] text-blue-400">Official Governance Structure</p>
    </div>
    
    <!-- CHART (CENTERS AUTOMATICALLY) -->
    <div class="w-full overflow-x-auto pb-24 flex justify-center custom-scrollbar">
        <div class="tree">
            @php 
                /** 
                 * STEP 2: FLEXIBLE LOGIC 
                 * This finds officials based on keywords so Admin changes reflect immediately.
                 */

                // 1. Find Captain (Looks for 'captain' or 'punong')
                $captain = $officials->first(function($o) {
                    return \Illuminate\Support\Str::contains(strtolower($o->position), ['captain', 'punong']);
                }); 

                // 2. Find Council Members (Kagawads and SK)
                $council = $officials->filter(function($o) use ($captain) {
                    $isCouncil = \Illuminate\Support\Str::contains(strtolower($o->position), ['kagawad', 'sk chairperson', 'sk chairman', 'councilor']);
                    return $isCouncil && (!$captain || $o->id !== $captain->id);
                });

                // 3. Find Admin Staff (Secretary and Treasurer)
                $adminStaff = $officials->filter(function($o) use ($captain, $council) {
                    $isAdmin = \Illuminate\Support\Str::contains(strtolower($o->position), ['secretary', 'treasurer']);
                    $alreadyUsed = ($captain && $o->id === $captain->id) || $council->contains('id', $o->id);
                    return $isAdmin && !$alreadyUsed;
                });

                // 4. THE SAFETY NET: Anyone else added in Admin (Tanods, Utility, Clerks, etc.)
                $others = $officials->filter(function($o) use ($captain, $council, $adminStaff) {
                    $usedIds = collect([$captain ? $captain->id : null])
                                ->merge($council->pluck('id'))
                                ->merge($adminStaff->pluck('id'))
                                ->filter();
                    return !$usedIds->contains($o->id);
                });
            @endphp
            
            @if($officials->count() > 0)
                <ul>
                    <li>
                        <!-- ROW 1: THE CAPTAIN -->
                        @if($captain)
                            <div class="flex justify-center mb-10">
                                @include('public.officials._card', ['official' => $captain])
                            </div>
                        @endif
                        
                        <!-- ROW 2: LEGISLATIVE COUNCIL (Kagawads/SK) -->
                        @if($council->count() > 0)
                        <ul>
                            @foreach($council as $member)
                                <li>@include('public.officials._card', ['official' => $member])</li>
                            @endforeach
                        </ul>
                        @endif

                        <!-- ROW 3: ADMINISTRATIVE (Secretary/Treasurer) -->
                        @if($adminStaff->count() > 0)
                        <ul class="mt-20">
                            @foreach($adminStaff as $staff)
                                <li>@include('public.officials._card', ['official' => $staff])</li>
                            @endforeach
                        </ul>
                        @endif

                        <!-- ROW 4: OTHERS (Everything else added in Admin panel) -->
                        @if($others->count() > 0)
                        <ul class="mt-20">
                            @foreach($others as $other)
                                <li>@include('public.officials._card', ['official' => $other])</li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                </ul>
            @else
                <!-- If Admin panel is empty -->
                <div class="mx-auto max-w-2xl rounded-3xl border border-white/10 bg-white/5 p-20 text-center backdrop-blur-md">
                    <p class="text-lg font-medium text-blue-100/40">No officials records found in the system.</p>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    /* Tree Lines Logic */
    .tree ul { padding-top: 40px; position: relative; display: flex; justify-content: center; padding-left: 0; white-space: nowrap; }
    .tree li { display: inline-block; vertical-align: top; text-align: center; list-style-type: none; position: relative; padding: 40px 20px 0 20px; }
    .tree li::before, .tree li::after { content: ''; position: absolute; top: 0; right: 50%; border-top: 2px solid rgba(59, 130, 246, 0.4); width: 50%; height: 40px; }
    .tree li::after { right: auto; left: 50%; border-left: 2px solid rgba(59, 130, 246, 0.4); }
    .tree li:only-child::after, .tree li:only-child::before { display: none; }
    .tree li:only-child { padding-top: 0; }
    .tree li:first-child::before, .tree li:last-child::after { border: 0 none; }
    .tree li:last-child::before { border-right: 2px solid rgba(59, 130, 246, 0.4); border-radius: 0 5px 0 0; }
    .tree li:first-child::after { border-radius: 5px 0 0 0; }
    .tree ul ul::before { content: ''; position: absolute; top: 0; left: 50%; border-left: 2px solid rgba(59, 130, 246, 0.4); width: 0; height: 40px; }
    
    /* Scrollbar Styling */
    .custom-scrollbar::-webkit-scrollbar { height: 6px; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(59,130,246,0.3); border-radius: 10px; }
</style>
@endsection