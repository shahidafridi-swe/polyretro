@props(['retros', 'team', 'members', 'actions'])

<div x-data="team" class="grid grid-cols-12 gap-1">
    <div class="py-5 bg-cyan-700/0 col-span-3">

        <div class="">
            <div class="flex items-center  gap-2">

                <x-section-heading >Retrospectives</x-section-heading>
                <p>({{ $retros->count() }})</p>
                <x-retro.create-modal-button><i class="fa-solid fa-plus rounded-full p-3 hover:bg-cyan-800/30 hover:ring-2 hover:ring-cyan-800/50 text-cyan-500 transition"></i></x-retro.create-modal-button>
            </div>
            <div class="space-y-3" >

                @foreach($retros as $retro)
                    <a class="block" href="{{ route('retro.show', $retro->id) }}">
                        <x-retro.sprint-card :retro="$retro" :team="$team"></x-retro.sprint-card>
                    </a>
                @endforeach
            </div>
        </div>


        <div class="mt-5">
            <div class="flex items-center  gap-2">
                <x-section-heading>Members</x-section-heading>
                <x-teams.add-member-modal-button>
                    <i class="fa-solid fa-plus rounded-full p-3 hover:bg-cyan-800/30 hover:ring-2 hover:ring-cyan-800/50 text-cyan-500 transition"></i>
                </x-teams.add-member-modal-button>
            </div>

            <div class="space-y-2">
                @foreach($members as $member)

                    <x-retro.member :member="$member"></x-retro.member>

                @endforeach
            </div>

        </div>

    </div>

    <div class="p-5 col-span-9">
        <div>
            <x-section-heading>Team actions ({{$actions->count()}})</x-section-heading>
            <div class="space-y-3">
                <template x-for="action in actions" :key="action.id">
                    <button @click="openActionModal(action)" class="block w-full text-start">
                        <x-action.action :with_logo="false"></x-action.action>
                    </button>
                </template>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('team', () => ({
            showActions : false,


            actions: @json($actions),


        }))
    });
</script>
