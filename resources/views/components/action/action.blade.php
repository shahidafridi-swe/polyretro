@props(['with_logo' => true])

<div class="flex gap-x-3 cursor-pointer">
    @if($with_logo)
        <x-teams.team-text-logo logo_size="min">bk</x-teams.team-text-logo>
    @endif
    <div class=" bg-gray-800/50 rounded content-center px-2 shadow-md shadow-gray-950/80 ">
        <div class="grid grid-cols-12">
            <div class="col-span-9 content-center">
                <div class="flex items-center gap-2">
                    <div class="">
                        <span class="text-3xl "><i class="fa-regular fa-circle-check rounded-full   " :class="action.status === 'complete' ? 'text-green-500' : ''"></i></span>
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

                        <span @click.stop>
                            <template x-if="action.priority=='high'">
                                    <i class="fa-solid fa-angles-up rounded-full p-3 hover:bg-cyan-800/30 hover:ring-2 hover:ring-cyan-800/50 text-red-800 transition"></i>
                            </template>
                            <template x-if="action.priority=='medium'">
                                <i class="fa-solid fa-equals rounded-full p-3 hover:bg-cyan-800/30 hover:ring-2 hover:ring-cyan-800/50 text-yellow-800 transition"></i>
                            </template>
                            <template x-if="action.priority=='low'">
                                <i class="fa-solid fa-angles-down rounded-full p-3 hover:bg-cyan-800/30 hover:ring-2 hover:ring-cyan-800/50 text-green-800 transition"></i>
                            </template>
                        </span>

                        <div data-popover id="popover-click" role="tooltip" class="absolute z-10 invisible inline-block w-30 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                            <div class="px-3 py-2 border-b  rounded-t-lg border-gray-600 bg-cyan-700">
                                <h3 class="font-semibold text-gray-100 text-center">PRIORITY</h3>
                            </div>
                            <div class="text-center">

                                <p @click="updateActionPriority('high')" class="bg-red-900/40 p-2 cursor-pointer hover:bg-cyan-900 transition"><i class="fa-solid fa-angles-up text-red-600"></i></p>
                                <p @click="updateActionPriority('medium')" class="bg-yellow-900/50 p-2 cursor-pointer hover:bg-cyan-900 transition"><i class="fa-solid fa-equals text-yellow-600"></i></p>
                                <p @click="updateActionPriority('low')" class="bg-green-900/50 p-2 cursor-pointer hover:bg-cyan-900 transition"><i class="fa-solid fa-angles-down text-green-600"></i></p>
                            </div>
                            <div data-popper-arrow></div>
                        </div>

                    </div>

                    <div>
                        <span><i class="fa-solid fa-calendar-plus rounded-full p-3 hover:bg-cyan-800/30 hover:ring-2 hover:ring-cyan-800/50 text-cyan-500 transition"></i></span>
                    </div>

                    <div class="flex justify-center gap-2 hover:bg-cyan-800/30 hover:ring-2 hover:ring-cyan-800/50 text-cyan-500 transition p-2 rounded-full">
                        <template x-for="member in action.assigned_users">
                            <div class="rounded-full ring-2 ring-cyan-500 w-8 h-8">
                                <img class="rounded-xl w-10 border-1 border-cyan-500" :src="'{{ asset('storage') }}/' + member.photo"  alt="author photo">
                            </div>
                        </template>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
