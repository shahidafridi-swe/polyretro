@props(['with_logo' => true])

<div class="flex gap-x-3 mt-4">
    @if($with_logo)
        <x-teams.team-text-logo logo_size="min">bk</x-teams.team-text-logo>
    @endif
    <div class=" bg-gray-800/50 rounded content-center px-2 shadow-md shadow-gray-950/80 ">
        <div class="grid grid-cols-12">
            <div class="col-span-9 content-center">
                <div class="flex items-center gap-2">
                    <div class="">
                        <span class="text-3xl "><i class="fa-regular fa-circle-check rounded-full hover:text-green-500 transition  hover:shadow-xl hover:shadow-green-500/50 "></i></span>
                    </div>
                    <div class="">
                        <p x-text="action.body" class="text-gray-200"></p>
                    </div>
                    <div>
                        <p x-text="action.deadline"></p>
                    </div>
                </div>
            </div>
            <div class="col-span-3">
                <div class="flex gap-1 content-center items-center justify-end">
                    <div>
                        <span><i class="fa-solid fa-angles-up rounded-full p-3 hover:bg-cyan-800/30 hover:ring-2 hover:ring-cyan-800/50 text-red-800 transition"></i></span>
                    </div>
                    <div>
                        <span><i class="fa-solid fa-calendar-plus rounded-full p-3 hover:bg-cyan-800/30 hover:ring-2 hover:ring-cyan-800/50 text-cyan-500 transition"></i></span>
                    </div>
                    <div class="flex justify-center gap-2 hover:bg-cyan-800/30 hover:ring-2 hover:ring-cyan-800/50 text-cyan-500 transition p-2 rounded-full">
                        <div class="rounded-full ring-2 ring-cyan-500 w-8 h-8">
                            <img class="rounded-full" src="https://picsum.photos/100" alt="">
                        </div>
                        <div class="rounded-full ring-2 ring-green-500 w-8 h-8">
                            <img class="rounded-full" src="https://picsum.photos/100" alt="">
                        </div>
                        <div class="rounded-full ring-2 ring-green-500 bg-green-500/10 text-gray-100 w-8 h-8 flex items-center justify-center">
                            <span class="rounded-full text-sm">SA</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
