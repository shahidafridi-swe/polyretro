<div style="background-color: {{$team->color}};" class="rounded-xl hover:scale-103 transition-all hover:shadow-md hover:shadow-gray-950/30 relative hover:bg-cyan-950/80 ">
    <div class="team-card p-5  rounded-xl flex flex-col justify-center items-center gap-2 bg-gray-950/70" >
        <x-teams.team-text-logo logo_size="max">{{ Str::limit($team->name, 2, '') }}</x-teams.team-text-logo>
        <p class="font-bold text-xl">{{ $team->name }}</p>
        <span class="text-sm"><i class="fa-regular fa-circle-check mr-1"></i>3</span>

        <span class="absolute top-1 right-1 text-sm rounded-full py-1 px-3 text-gray-500 hover:bg-cyan-800/30 hover:ring-2 hover:ring-cyan-800/50 hover:text-gray-100 transition">
        <i class="fa-solid fa-ellipsis-vertical"></i>
    </span>
    </div>
</div>
