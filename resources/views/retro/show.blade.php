<x-app-layout>
    <div class="mx-auto bg-center bg-no-repeat min-h-screen" style="background-image: url('{{ asset('images/madsadglad.png') }}');" x-data="{ showActions: false }">

        <div class="text-cyan-500/70 border-b border-b-cyan-500/30">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <h3 class="uppercase text-4xl font-semibold">Team {{ $team->name }} >> {{ $retro->name }} </h3>
                <div>
                    <div class="tab">
                        <button
                            class="px-4 py-2 transition"
                            :class="showActions ? 'bg-cyan-900/50 text-white' : '' "
                            @click="showActions = !showActions">
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
                <div x-show="showActions" class="col-span-4 py-5 bg-gray-700/10">
                    <div class=" text-center py-5 ">
                        <i class="fa-solid fa-circle-check text-4xl text-gray-400 "></i>
                        <h3 class="text-2xl text-gray-400 ">Team Actions</h3>
                    </div>
                    <div  class="py-5">
                        <x-action.action :with_logo="false"></x-action.action>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
