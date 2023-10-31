<div class="flex flex-wrap justify-between gap-2 pt-2">
    @foreach ($menuconfig as $menu)
        @if ($menu['active'])
            <a href="{{route($menu['route'])}}" class="w-[8rem] h-[8rem] p-2 border hover:border-azul-100 text-azul-100 bg-white hover:bg-azul-400 hover:shadow-lg uppercase rounded-lg">
                <div class="text-center text-[44pt]">
                    <i class="{{$menu['icon']}}"></i>
                </div>
                <h3 class="text-[10pt] text-center font-medium">Criar Grupo</h3>
            </a>
        @endif

    @endforeach


</div>
