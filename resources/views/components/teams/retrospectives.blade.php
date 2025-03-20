<div class="pt-5">
    <div>
        <x-section-heading>Open Retrospectives</x-section-heading>
        <div class="grid grid-cols-3 gap-3 ">
            <div class="">
                <x-retro.create-modal-button>
                    <div class=" flex flex-col gap-2 justify-center items-center bg-cyan-900/50 rounded border-2 text-cyan-500 border-cyan-500 hover:scale-102 hover:bg-cyan-900 cursor-pointer transition p-17">
                        <i class="fa-solid fa-plus text-3xl"></i>
                        <p class="font-bold">START RETROSPECTIVE</p>
                    </div>

                </x-retro.create-modal-button>
            </div>


            <x-retro.sprint-card ></x-retro.sprint-card>
            <x-retro.sprint-card ></x-retro.sprint-card>
        </div>
    </div>

    <div class="mt-10">
        <x-section-heading>Closed Retrospectives</x-section-heading>
        <div class="grid grid-cols-3 gap-3 ">
            <x-retro.sprint-card ></x-retro.sprint-card>
            <x-retro.sprint-card ></x-retro.sprint-card>
            <x-retro.sprint-card ></x-retro.sprint-card>
        </div>
    </div>
</div>
