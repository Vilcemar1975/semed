<a href="{{ route($route) }}"
    class="flex flex-nowrap bg-green-500 hover:bg-green-900 text-[12pt] text-white uppercase px-3 py-2 rounded-md active:bg-green-950 uppercase"
>    <i class="{{ $icon ?? '' }}"></i>
    <p class="self-center">{{$title ?? ""}}</p>
</a>
