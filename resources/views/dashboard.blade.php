<x-app-layout >

    <div x-data="dashboard" class="py-12 max-w-7xl mx-auto ">
        <div class="grid grid-cols-12">
            <div class="p-5 col-span-2">
                <div class="">
                    @if (auth()->check())
                        <img class="rounded-full ring-2 ring-cyan-500" src="{{ asset('storage/' . auth()->user()->photo) }}" alt="">
                    @else
                        <img class="rounded-full ring-2 ring-cyan-500" src="https://picsum.photos/150" alt="">
                    @endif
                </div>
                <div class="mt-5 text-center ">
                    <span class="text-xl">{{auth()->user()->name}}</span>
{{--                    <span class="ms-2 text-cyan-500"><i class="fa-solid fa-pen "></i></span>--}}
                </div>
            </div>

            <div class="p-1 col-span-10 mt-5">
                <section class="actions">
                    <x-section-heading>Your Actions ({{$actions->count()}})</x-section-heading>
                   <div class="space-y-3 mt-3">

                       @foreach($actions as $action)
                           <x-action.dashboard-action :action="$action"></x-action.dashboard-action>
                       @endforeach
                   </div>

                </section>

                <section class="in-progress mt-10">
                    <x-section-heading>Currently in progress ({{$retros->count()}})</x-section-heading>
                    <div class="grid grid-cols-3 gap-3">
                        @foreach($retros as $retro)
                            <a class="block" href="{{ route('retro.show', $retro->id) }}">
                                <x-retro.sprint-card :with_logo="true" :retro="$retro" ></x-retro.sprint-card>
                            </a>
                        @endforeach

                    </div>
                </section>

                <section class="teams mt-10">
                    <div class="flex items-center  gap-2">
                        <x-section-heading>Your Teams</x-section-heading>
                        <x-teams.create-modal-button></x-teams.create-modal-button>
                    </div>

                    <div class="grid grid-cols-3 gap-3">
                        @foreach($teams as  $team)
                            <a href="{{ route('teams.show', $team->id) }}"> <x-teams.team-card :team="$team" ></x-teams.team-card></a>
                        @endforeach
                    </div>

                </section>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('dashboard', () => ({

            actions: @json($actions),

            init(){

            },

        }))
    })

</script>

