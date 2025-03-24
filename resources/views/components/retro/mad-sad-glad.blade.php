@props(['team', 'retro'])

<div class="grid grid-cols-3 gap-0.5">
    <div class="col-span-1 px-1">
        <x-retro.mad :retro="$retro"></x-retro.mad>
    </div>
    <div class="col-span-1 px-1">
        <x-retro.sad :retro="$retro"></x-retro.sad>
    </div>
    <div class="col-span-1 px-1">
        <x-retro.glad :retro="$retro"></x-retro.glad>
    </div>
</div>
