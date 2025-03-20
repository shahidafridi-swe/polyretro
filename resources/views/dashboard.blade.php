<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto ">
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
                        <x-retro.in-progress-sprint></x-retro.in-progress-sprint>
                        <x-retro.in-progress-sprint></x-retro.in-progress-sprint>

                    </div>
                </section>
                <section class="teams mt-10">
                    <div class="flex items-center  gap-2">
                        <x-section-heading>Your Teams</x-section-heading>
                        <x-teams.create-modal-button></x-teams.create-modal-button>
                    </div>

                    <div class="grid grid-cols-3 gap-3">
                        @foreach($teams as  $team)
                            <a href="/teams/show"> <x-teams.team-card :team="$team"></x-teams.team-card></a>
                        @endforeach
                    </div>

                </section>
            </div>
        </div>
    </div>
</x-app-layout>
