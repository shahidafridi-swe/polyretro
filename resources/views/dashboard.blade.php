<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="grid grid-cols-12">
            <div class="p-5 col-span-2">
                <div class="">
                    @if (auth()->check())
                        <img class="rounded-full ring-2 ring-cyan-500" src="{{ asset('storage/' . auth()->user()->photo) }}" alt="">
                    @else
                        <img class="rounded-full ring-2 ring-cyan-500" src="https://picsum.photos/150" alt="">
                    @endif
                </div>
                <div class="mt-5 text-center ">
                    <span class="text-xl">Shahid Afridi </span>
                    <span class="ms-2 text-cyan-500"><i class="fa-solid fa-pen "></i></span>
                </div>
            </div>

            <div class="p-1 col-span-10 mt-5">
                <section class="actions">
                    <x-section-heading>Your Actions</x-section-heading>
                    <x-action></x-action>
                    <x-action></x-action>
                </section>

                <section class="in-progress mt-10">
                    <x-section-heading>Currently in progress</x-section-heading>
                    <div class="grid grid-cols-3 gap-3">
                        <x-in-progress-sprint></x-in-progress-sprint>
                        <x-in-progress-sprint></x-in-progress-sprint>

                    </div>
                </section>
                <section class="teams mt-10">
                    <div class="flex items-center  gap-2">
                        <x-section-heading>Your Teams</x-section-heading>
                        <div>
                            <button class="py-1 px-4 font-bold rounded-full bg-cyan-600 text-gray-200 hover:bg-cyan-800 hover:text-gray-100 hover:outline-1 hover:outline-cyan-500 transition cursor-pointer hover:shadow-lg hover:shadow-cyan-500/50" data-modal-target="static-modal" data-modal-toggle="static-modal">CREATE TEAM</button>

                            <div>

                                <!-- Main modal -->
                                <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black/85">
                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Static modal
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-4 md:p-5 space-y-4">
                                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                    With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                                                </p>
                                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                    The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                                                </p>
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                <button data-modal-hide="static-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                                                <button data-modal-hide="static-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
