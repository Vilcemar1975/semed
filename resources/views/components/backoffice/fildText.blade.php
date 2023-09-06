<div class="block w-full mt-2">
    @include('components.backoffice.label',['idname' => $idname,'label' => $label])
    <input type="text" name="{{$idname}}" id="{{$idname}}"
        @if ($max > 0) maxlength="{{$max}}" @endif
        @if ($min > 0) minlength="{{$min}}" @endif
        class="block p-2 rounded-lg w-full border-azul-100"
    >
    @error('{{$idname}}')
        <div class="">{{ $message }}</div>
    @enderror
</div>
