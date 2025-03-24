@props(['member'])
<div class="flex items-center gap-4">
    <div class="rounded-full ring-2 ring-cyan-500 w-8 h-8">
        @if($member->user->photo)
        <img class="rounded-full ring-2 ring-cyan-500" src="{{ asset('storage/' . $member->user->photo) }}" alt="">
        @else
        <img class="rounded-full" src="https://picsum.photos/100" alt="">
        @endif
    </div>
    <div class="-space-y-1">
        <span class="block">{{ $member->user->name }}</span>
{{--        <span class="text-xs bg-gray-600/50 px-2 rounded-xl ">ADMIN</span>--}}
    </div>
</div>
