@props(['logo_size' => "mid"])

@if($logo_size == "min")
    <div class="col-span-1 bg-cyan-700 text-center w-10 h-10 text-lg rounded text-gray-100 font-bold flex items-center justify-center">
        {{$slot}}
    </div>
@elseif($logo_size == "mid")
    <div class="col-span-1 bg-cyan-700 text-center w-12 h-12 text-xl rounded text-gray-100 font-bold flex items-center justify-center">
        {{$slot}}
    </div>
@elseif($logo_size == "max")
    <div class="col-span-1 bg-cyan-700 text-center w-20 h-20 text-4xl rounded-lg text-gray-100 font-bold flex items-center justify-center">
        {{$slot}}
    </div>
@endif


