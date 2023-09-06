<ul class="mt-1">
    @foreach ($dados as $menu)
        <li class="my-2 overflow-hidden">
            <a class="flex flex-nowrap gap-2 @if ($menu['route'] == $ativar)
                bg-azul-500
            @else
                bg-azul-100
            @endif  hover:bg-azul-500 text-white sm:rounded-md py-1 px-2" href="{{route($menu['route'])}}">
                <i class="fa-solid {{$menu['icon']}} p-1"></i>
                <p class="pt-1">{{$menu['name']}}</p>
            </a>
        </li>
    @endforeach
</ul>
