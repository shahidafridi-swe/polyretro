@props(['team', 'retro'])

<div class="grid grid-cols-3 gap-0.5">
    <div class="col-span-1 px-1">
        <div>
            <span class="text-7xl"><i class="fa-regular fa-face-angry text-red-600"></i></span>
            <p class="font-bold">Mad</p>
            <p class="text-gray-400/50">What is driving you crazy?</p>
        </div>
        <div class="py-2 px-1 bg-gray-800/50 rounded space-y-3">

            <div>
                <form method="POST" action="" class="max-w-lg mx-auto  p-6 rounded-lg shadow-lg">
                    @csrf

                    <input type="hidden" name="retro_id" value="{{ $retro->id }}">

                    <input type="text" name="body" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </form>

            </div>


            <x-retro.mad-post></x-retro.mad-post>
            <x-retro.mad-post></x-retro.mad-post>
        </div>
    </div>
    <div class="col-span-1 px-1">
        <div>
            <span class="text-7xl"><i class="fa-regular fa-face-frown text-yellow-600"></i></span>
            <p class="font-bold">Sad</p>
            <p class="text-gray-400/50">What is disappointing you?</p>
        </div>
        <div class="py-2 px-1 bg-gray-800/50 rounded space-y-3">
            <x-retro.sad-post></x-retro.sad-post>
            <x-retro.sad-post></x-retro.sad-post>

        </div>
    </div>
    <div class="col-span-1 px-1">
        <div>
            <span class="text-7xl"><i class="fa-regular fa-face-smile text-green-600" ></i></span>
            <p class="font-bold">Glad</p>
            <p class="text-gray-400/50">What is making you happy?</p>
        </div>
        <div class="py-2 px-1 bg-gray-800/50 rounded space-y-3">
            <x-retro.glad-post></x-retro.glad-post>
            <x-retro.glad-post></x-retro.glad-post>

        </div>
    </div>
</div>
