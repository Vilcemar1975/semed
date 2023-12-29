<div class="flex gap-2 flex-nowrap mt-2 px-3 text-azul-100 font-semibold uppercase ">

    <input type="checkbox" name="{{$idname}}" id="{{$idname}}"
        class="block rounded-md border-azul-100 w-[24px] h-[24px] self-center"
        @if ($checked)
            checked
        @endif
    >

    <label for="{{$idname}}" class="self-center">{{ $label}}</label>

   {{--  @error('{{$idname}}')
        <div class="">{{ $message }}</div>
    @enderror --}}
</div>
