<div class="mt-10">
    <div class="flex">

        <div class="flex justify-center items-center gap-x-3">
            <p>Members: {{ $members->count() }}</p>
            <x-teams.add-member-modal-button>
                <div class="col-span-1 flex gap-x-2 justify-center items-center bg-cyan-900/50 rounded-full border-2 text-cyan-500 border-cyan-500 hover:scale-102 hover:bg-cyan-900 cursor-pointer transition px-3">
                    <p class="font-bold">ADD MEMBER</p>
                    <i class="fa-solid fa-plus"></i>
                </div>
            </x-teams.add-member-modal-button>
        </div>
        <div>

        </div>
    </div>

    <div class="mt-2">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
{{--                    <th scope="col" class="px-6 py-3">--}}
{{--                        Team Role--}}
{{--                    </th>--}}
                    <th scope="col" class="px-6 py-3">

                    </th>

                </tr>
                </thead>
                <tbody>
                @foreach($members as $member)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 transition">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $member->user->name}}
                        </th>
                        <td class="px-6 py-4">
                            {{ $member->user->email }}
                        </td>
{{--                        <td class="px-6 py-4">--}}
{{--                            {{ $member->name }}--}}
{{--                        </td>--}}
                        <td class="px-6 py-4 text-right">
                            <a href="#" class=""><i class="fa-regular fa-trash-can font-medium dark:text-red-500 rounded-full p-3 hover:bg-red-800/30 hover:ring-2 hover:ring-red-800/50 text-red-800  transition hover:scale-120"></i></a>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
    </div>

</div>
