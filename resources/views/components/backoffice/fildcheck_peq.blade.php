<div class="flex gap-2 flex-nowrap mt-2 px-3 text-azul-100 font-semibold uppercase ">

    <input type="checkbox" name="{{$idname}}" id="{{$idname}}"
        class="block rounded-sm border-azul-100 w-[16px] h-[16px] self-center"
    >
    <label for="{{$idname}}" class="self-center text-[8pt]">{{ $label}}</label>

    @error('{{$idname}}')
        <div class="">{{ $message }}</div>
    @enderror
</div>
