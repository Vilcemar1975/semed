<div class="block w-full mt-2">


    @include('components.backoffice.label',['idname' => $idname,'label' => $label])
    <select name="{{$idname}}" id="{{$idname}}"
        class="w-full rounded-md border-azul-100 self-center text-azul-100"
    >
        <option value="-">-</option>

        @forelse ( $lista as $item)
            <option value="{{$item ?? ''}}">{{$item ?? ""}}</option>
        @empty
            <option value="-">Não há registro!</option>
        @endforelse

    </select>

    @error('{{$idname}}')
        <div class="">{{ $message }}</div>
    @enderror

</div>
