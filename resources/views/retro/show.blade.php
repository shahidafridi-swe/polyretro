<x-app-layout>
    <div class="mx-auto bg-center bg-no-repeat min-h-screen" style="background-image: url('{{ asset('images/madsadglad.png') }}');" x-data="{ showActions: false }">

        <div class="text-cyan-500/70 border-b border-b-cyan-500/30">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <h3 class="uppercase text-4xl font-semibold">Team <a href="{{ route('teams.show', $team->id) }}" class="hover:text-cyan-300">{{ $team->name }}</a> <i class="fa-solid fa-angle-right text-cyan-200"></i> {{ $retro->name }} </h3>
                <div>
                    <div class="tab">
                        <button
                            class="px-4 py-2 transition"
                            :class="showActions ? 'bg-cyan-900/50 text-white' : '' "
                            @click="showActions = !showActions" >
                            Team Actions
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-black/50 min-h-screen">
            <div class="grid grid-cols-12 max-w-7xl mx-auto gap-1 pt-5">
                {{-- Mad-Sad-Glad --}}
                <div :class="showActions ? 'col-span-8' : 'col-span-12'" class="py-10 ">
                    <x-retro.mad-sad-glad :retro="$retro" :team="$team"></x-retro.mad-sad-glad>
                </div>

                {{-- Team Actions --}}
                <div x-show="showActions" class="col-span-4 pt-5">
                    <x-retro.team-actions :retro="$retro" :team="$team"></x-retro.team-actions>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
