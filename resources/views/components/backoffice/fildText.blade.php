<div class="block w-full mt-2">
    @include('components.backoffice.label',['idname' => $idname,'label' => $label])
    <input type="{{ $type ?? 'text' }}" name="{{$idname}}" id="{{$idname}}" placeholder="{{ $placeholder ?? ""}}"
        @if ($max > 0) maxlength="{{$max}}" @endif
        @if ($min > 0) minlength="{{$min}}" @endif
        @isset($disable)
             @if ($disable == true) disabled @endif
        @endisset


        class="p-2 rounded-lg w-full border-azul-100"
        @isset($value)
            value="{{$value}}"
        @endisset



    >
    @error('{{$idname}}')
        <div class="">{{ $message }}</div>
    @enderror
</div>
