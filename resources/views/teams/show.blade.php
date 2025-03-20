<x-app-layout>

<section class="grid grid-cols-12 max-w-7xl mx-auto gap-1 mt-5">

    <div class="p-5 bg-cyan-700/0 col-span-3">
        <div class="">
            <div class="flex items-center  gap-2">
                <x-section-heading >Retrospectives</x-section-heading>
                <x-retro.create-modal-button></x-retro.create-modal-button>
            </div>
            <div>
                <a href="/retro/show">
                    <x-retro.in-progress-sprint></x-retro.in-progress-sprint>
                </a>
            </div>
        </div>


        <div class="mt-5">
            <div class="flex items-center  gap-2">
                <x-section-heading>Members</x-section-heading>
                <x-retro.create-modal-button></x-retro.create-modal-button>
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



</section>

</x-app-layout>
