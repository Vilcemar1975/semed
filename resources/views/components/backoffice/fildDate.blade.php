<div class="block w-full mt-2">
    @include('components.backoffice.label',['idname' => $idname,'label' => $label])
    <input type="date" name="{{$idname}}" id="{{$idname}}"
        class="p-2 rounded-md w-full border-azul-100 text-azul-100"
    >
    {{-- @error('{{$idname}}')
        <div class="">{{ $message }}</div>
    @enderror --}}
</div>
