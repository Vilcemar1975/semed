<div class="block w-full mt-2">

    @include('components.backoffice.label',['idname' => $idname,'label' => $label])
    <select name="{{$idname}}" id="{{$idname}}"
        class="w-full rounded-md border-azul-100 self-center text-azul-100"
    >
    <option value="">Selecione uma categoria</option>
    <option value="">Teste 01</option>
    <option value="">Teste 02</option>
    <option value="">Teste 03</option>

    </select>

    @error('{{$idname}}')
        <div class="">{{ $message }}</div>
    @enderror
</div>
