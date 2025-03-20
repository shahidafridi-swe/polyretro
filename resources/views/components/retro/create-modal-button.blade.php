<div>

    <button data-modal-target="static-modal" data-modal-toggle="static-modal"><i class="fa-solid fa-plus rounded-full p-3 hover:bg-cyan-800/30 hover:ring-2 hover:ring-cyan-800/50 text-cyan-500 transition"></i></button>
    <div>

        <!-- Main modal -->
        <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black/85">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-900">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Create a Team
                        </h3>
                        <button type="button" class="text-red-700 bg-transparent hover:bg-gray-200 hover:text-gray-300 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center  dark:hover:bg-red-700 transition " data-modal-hide="static-modal">
                            <svg class="w-3 h-3  font-bold" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
{{--                        <x-teams.create></x-teams.create>--}}
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
