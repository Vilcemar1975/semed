<div class="flex gap-2 flex-nowrap mt-2 px-3 text-azul-100 font-semibold uppercase ">

    <input type="radio" name="{{$idname}}" id="{{$idid}}"
        class="block rounded-lg border-azul-100 w-[15px] h-[15px] self-center"
        @isset($checkted)
            @if ($checkted)
                checked
            @endif
        @endisset
        value="{{$value}}"
    >
    <label for="{{$idid}}" class="self-center text-[9pt]">{{ $label}}</label>

    @error('{{$idname}}')
        <div class="">{{ $message }}</div>
    @enderror
</div>
