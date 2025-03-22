@props(['with_logo' => false, 'retro', 'team'])

<div class="col-span-1 bg-gray-800/50 p-5 rounded hover:scale-103 transition hover:bg-gray-800 cursor-pointer">
    <div class="flex gap-2  text-gray-400">
        <div class="">
            <span class="text-2xl"><i class="fa-regular fa-face-angry text-red-600"></i></span>
            <p class="text-sm -mt-1.5 ">Mad</p>
            <hr class="text-red-900 outline-2 w-12 my-2 mt-0"/>
            <hr class="text-red-900 outline-2 w-12 my-2"/>
            <hr class="text-red-900 outline-2 w-12 my-2"/>
        </div>
        <div>
            <span class="text-2xl"><i class="fa-regular fa-face-frown text-yellow-600"></i></span>
            <p class="text-sm -mt-1.5"> Sad</p>
            <hr class="text-yellow-900 outline-2 w-12 my-2 mt-0"/>
            <hr class="text-yellow-900 outline-2 w-12 my-2"/>
            <hr class="text-yellow-900 outline-2 w-12 my-2"/>
        </div>
        <div>
            <span class="text-2xl"><i class="fa-regular fa-face-smile text-green-600" ></i></span>
            <p class="text-sm -mt-1.5 ">Glad</p>
            <hr class="text-green-900 outline-2 w-12 my-2 mt-0"/>
            <hr class="text-green-900 outline-2 w-12 my-2"/>
            <hr class="text-green-900 outline-2 w-12 my-2"/>
        </div>
    </div>

    <div class="mt-10 flex gap-2">
        @if($with_logo)
            <x-teams.team-text-logo logo_size="min">bk</x-teams.team-text-logo>
        @endif
        <div>
            <div class="">
                <span class="text-gray-200">{{ isset($retro) ? $retro->name : 'Sprint' }}</span>
                <span class="text-gray-200">-</span>
                <span>{{ isset($retro) ? \Carbon\Carbon::parse($retro->created_at)->format('D d F Y') : 'Sprint Date' }}</span>
            </div>
            <span class="bg-black/50 py-0.5 px-2 text-gray-300/70 rounded-xl uppercase">{{ isset($retro) ? $retro->status : 'Status' }}</span>
        </div>
    </div>
</div>
