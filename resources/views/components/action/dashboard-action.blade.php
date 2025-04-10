@props(['action', 'with_logo' => true])

<div class="flex gap-x-3 cursor-pointer">
    @if($with_logo)
{{--        <x-teams.team-text-logo logo_size="min">{{ Str::limit($action->retro, 2, '') }}</x-teams.team-text-logo>--}}
    @endif
    <div class=" bg-gray-800/50 rounded content-center px-2 shadow-md shadow-gray-950/80 ">
        <div class="grid grid-cols-12">
            <div class="col-span-9 content-center">
                <div class="flex items-center gap-2">
                    <div class="">
                        <span class="text-3xl ">
                        @if($action->action->status === 'complete')
                            <i class="fa-regular fa-circle-check rounded-full text-green-500 "></i>
                        @else
                            <i class="fa-regular fa-circle-check rounded-full  "></i>
                        @endif
                        </span>

                    </div>
                    <div class="">
                        <p  class="text-gray-200">{{ $action->action->body }}</p>
                    </div>
                    <div>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="col-span-3">
                <div class="flex gap-1 content-center items-center justify-end">

                    <div>

                        <span >
                            @if($action->action->priority==='high')
                                <i class="fa-solid fa-angles-up rounded-full p-3 text-red-800 transition"></i>
                            @elseif($action->action->priority==='medium')
                                <i class="fa-solid fa-equals rounded-full p-3 text-yellow-800 transition"></i>

                            @elseif($action->action->priority==='low')
                                <i class="fa-solid fa-angles-down rounded-full p-3 text-green-800 transition"></i>

                            @endif
                        </span>



                    </div>

                    <div>
                        <span><i class="fa-solid fa-calendar-plus rounded-full p-3 text-cyan-500 transition"></i></span>
                    </div>

                    <div class="flex justify-center gap-2 text-cyan-500 transition p-2 rounded-full">
{{--                        <div class="rounded-full ring-2 ring-cyan-500 w-8 h-8">--}}
{{--                            <img class="rounded-full" src="https://picsum.photos/100" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="rounded-full ring-2 ring-green-500 w-8 h-8">--}}
{{--                            <img class="rounded-full" src="https://picsum.photos/100" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="rounded-full ring-2 ring-green-500 bg-green-500/10 text-gray-100 w-8 h-8 flex items-center justify-center">--}}
{{--                            <span class="rounded-full text-sm">SA</span>--}}
{{--                        </div>--}}
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
