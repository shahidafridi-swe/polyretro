<x-app-layout>
<div class=" mx-auto bg-center bg-no-repeat min-h-screen" style="background-image: url('{{ asset('images/madsadglad.png') }}');">

    <div class="bg-black/50 min-h-screen">
        <div class=" grid grid-cols-12 max-w-7xl mx-auto gap-1 pt-5    "   >
            {{--Mad-Sad-Glad--}}
            <div class="col-span-8 py-10" >
                <x-retro.mad-sad-glad></x-retro.mad-sad-glad>
            </div>

            {{--Team Actions--}}
            <div class="col-span-4  p-5">
                <div class="bg-gray-700/10 text-center p-5 mx-5 rounded-xl hover:scale-110 transition cursor-pointer group  group-hover:text-gray-100 shadow hover:shadow-black">
                    <i class="fa-solid fa-circle-check text-4xl text-gray-400 group-hover:text-gray-200"></i>
                    <h3 class="text-2xl text-gray-400 group-hover:text-gray-200">Team Actions</h3>
                </div>
                <div class="bg-gray-700/10 p-10 rounded-xl">
                    <x-action.action></x-action.action>
                </div>

            </div>
        </div>
    </div>

</div>
</x-app-layout>
