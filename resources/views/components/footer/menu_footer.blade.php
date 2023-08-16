<div id="menu-footer" class="">
    <ul id="menuprinc" class="menuprinc-footer">
        @foreach ($dados['menuPrincipal'] as $menu)
            <li class="">

                <a class="" @if ($menu['sub'] != []) href="#" @else href="{{route($menu['route'])}}" @endif>
                    <span class="break-words">{{$menu['name']}}</span>
                </a>
                <hr style="border: 1px solid #075AA9">
                @if ($menu['sub'] != [])
                    <div id="submenu_{{$menu['id']}}" class="submenu-footer">
                        <ul class="">
                            @foreach ( $menu['sub'] as $sub)
                                <li>
                                    <a href="{{ route($menu['route'])}}" >{{$sub['name']}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </li>

        @endforeach
    </ul>
    <ul class="flex p-0 py-2 gap-2 justify-center bg-azul-100 ">

        @forelse ( $dados['iconBootStrap'] as $ico)
        <li>
            <a href="#" class=" text-azul hover:text-branco">

                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-instagram mt-1 p-1 border border-blue-100 hover:border-white rounded-sm hover:text-white" viewBox="0 0 16 16">
                    @foreach ($ico['d'] as $ic)
                        <path d="{{$ic}}"/>
                    @endforeach
                </svg>

            </a>
        </li>
        @empty

        @endforelse

    </ul>
</div>
