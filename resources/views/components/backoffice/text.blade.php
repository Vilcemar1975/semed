<div class="flex flex-col w-full mt-2">
    @include('components.backoffice.label',['idname' => "",'label' => $label])
    <h4 class="text-[12pt] text-azul-100 border border-azul-100 rounded-lg p-2 mb-2 ">{{$texto ?? ""}}</h4>
</div>
