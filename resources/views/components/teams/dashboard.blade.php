<div class="grid grid-cols-12 gap-1">
    <div class="py-5 bg-cyan-700/0 col-span-3">

        <div class="">
            <div class="flex items-center  gap-2">

                <x-section-heading >Retrospectives</x-section-heading>
                <p>({{ $retros->count() }})</p>
                <x-retro.create-modal-button><i class="fa-solid fa-plus rounded-full p-3 hover:bg-cyan-800/30 hover:ring-2 hover:ring-cyan-800/50 text-cyan-500 transition"></i></x-retro.create-modal-button>
            </div>
            <div>
                <a href="/retro/show">
                    <x-retro.sprint-card ></x-retro.sprint-card>
                </a>
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
                <x-retro.member></x-retro.member>
                <x-retro.member></x-retro.member>
            </div>

        </div>

    </div>

    <div class="p-5 col-span-9">
        <div>
            <x-section-heading>Team actions</x-section-heading>
            <div>
                <x-action.action></x-action.action>
            </div>
        </div>
    </div>
</div>
