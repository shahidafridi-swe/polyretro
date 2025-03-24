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

            @foreach($retros as $retro)
                <a class="block" href="{{ route('retro.show', $retro->id) }}">
                    <x-retro.sprint-card :retro="$retro" :team="$team"></x-retro.sprint-card>
                </a>
            @endforeach

        </div>
    </div>

    <div class="mt-10">
        <x-section-heading>Closed Retrospectives</x-section-heading>
        <div class="grid grid-cols-3 gap-3 ">
            @foreach($retros as $retro)
                @if($retro->status == 'complete')
                    <a class="block" href="{{ route('retro.show', $retro->id) }}">
                        <x-retro.sprint-card :retro="$retro" :team="$team"></x-retro.sprint-card>
                    </a>
                @endif
            @endforeach

        </div>
    </div>
</div>
