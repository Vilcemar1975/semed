<div class="block w-full mt-2">


    @include('components.backoffice.label',['idname' => $idname,'label' => $label])
    <select name="{{$idname}}" id="{{$idname}}"
        class="w-full rounded-md border-azul-100 self-center text-azul-100"
    >

        @isset($selected)
            <option value="{{$selected}}" selected>{{$selected}}</option>
        @endisset

        @forelse ( $lista as $item)

            <option value="{{$item['id']?? ''}}">{{$item['title'] ?? ""}}</option>
        @empty
            <option value="-">Não há registro!</option>
        @endforelse

    </select>

    @error('{{$idname}}')
        <div class="">{{ $message }}</div>
    @enderror

</div>
