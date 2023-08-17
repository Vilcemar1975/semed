<div id="menu-web" class="bg-white border-b-2 border-azul-100 shadow-lg fixed top-0 left-0 right-0 pb-2">
    <div style="display:block; position: fixed; right: 0px;">
        <div style="display: block; background-color: #075AA9;width: 300px; height: 32px; z-index: 202;"></div>
    </div>
    <div class="container">
        <div class="grid grid-rows-2 grid-flow-col auto-rows-max h-16">
            <div class="row-span-3 p-2 text-right f">
                <div class="flex justify-end pr-10">
                    <a href="{{ route('welcome')}}" >
                        <img src="{{asset('logos/escolataon_escura.png')}}" alt="" width="120px" height="20px" class="pr-5">
                    </a>
                    <a href="https://www.vilavelha.es.gov.br/secretaria/educacao" target="_blank">
                        <img src="{{asset('logos/logosemed.png')}}" alt="" width="120px" height="20px" class="">
                    </a>
                </div>
            </div>
            {{-- <div class="col-span-3 bg-gradient-to-r  from-azul-100 rounded-bl-lg text-blue-200 h-8 text-right"> --}}
                <div class="col-span-3 bg-azul-100 rounded-bl-lg text-blue-200 h-8 text-right">
                <div class="flex justify-between w-6/12">

                    <a href="#" class="flex justify-between mx-3 pt-1 pr-2  hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="26" height="26" class="bi bi-person-circle" viewBox="0 0 20 20" >
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                        <span class="">Entrar</span>
                    </a>

                    <ul class="flex p-0 pl-2 gap-2 justify-between ">

                        @forelse ( $dados['iconBootStrap'] as $ico)
                            <li>
                                <a href="{{ $ico['link'] }}" class="">

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

                    @include('components.menu.menu_seach')


                </div>


            </div>

            <div id="menu" class="col-span-3 auto-cols-max relative">
                <ul id="menuprinc" class="menuprinc">
                    @foreach ($dados['menuPrincipal'] as $menu)
                        <li class="">

                            <a class="" @if ($menu['sub'] != []) href="#" onclick="AbrirMenu('icon_{{$menu['id']}}', 'submenu_{{$menu['id']}}')" @else href="{{route($menu['route'])}}" @endif>
                                <span class="break-words">{{$menu['name']}}</span>
                                @if ($menu['sub'] != [])
                                    <svg id="icon_{{$menu['id']}}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="ico_seta">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                @endif
                            </a>

                            @if ($menu['sub'] != [])
                                <div id="submenu_{{$menu['id']}}" class="submenu" style="display: none">
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

            </div>
        </div>

    </div>

</div>
{{-- Menu Mobil --}}
<div id="menu-mobil" class="" >
   <div class="mobil-logos">
        <a href="{{ route('welcome')}}" class="flex justify-center py-3 ">
            <img src="{{asset('logos/escolataon_escura.png')}}" alt="" width="80px" height="10x" class="pr-5">
            <img src="{{asset('logos/logosemed.png')}}" alt="" width="80px" height="10px" class="">
        </a>
   </div>
   <div class="mobil-hamburg">
        <input type="checkbox" name="mobil-hamburg-botao" id="mobil-hamburg-botao" class="">
        <label for="mobil-hamburg-botao">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </label>
        <div class="mobil-continer" >
            <div class="col-span-3 bg-gradient-to-r  from-azul-100 rounded-bl-lg text-blue-200 h-8 text-right">
                <div class="flex justify-between w-6/12">

                    <a href="#" class="flex justify-between mx-3 pt-1 pr-2  hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="26" height="26" class="bi bi-person-circle" viewBox="0 0 20 20" >
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                        <span class="">Entrar</span>
                    </a>

                    <ul class="flex p-0 pl-2 gap-2 justify-between ">

                        @forelse ( $dados['iconBootStrap'] as $ico)
                        <li>
                            <a href="#" class="">

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


            </div>

            {{-- Pesquisar --}}
            <form action="#" method="get">
                @csrf
                <div class="menu-search-mobil">
                    <input type="search" id="botao-search-input-mobil" name="botao-search-input-mobil" class="botao-search-input-mobil"  placeholder="Pesquisar">
                    <button type="submit" id="botao-search-mobil" class="botao-search-mobil" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </div>
            </form>

            {{-- Menu --}}
            <ul id="mobil-menuprinc" class="mobil_menuprinc">
                @foreach ($dados['menuPrincipal'] as $menu)
                    <li class="">

                        <a class="" @if ($menu['sub'] != []) href="#" onclick="AbrirMenu('icon_mobil{{$menu['id']}}', 'submenu_mobil{{$menu['id']}}')" @else href="{{route($menu['route'])}}" @endif>
                            <span class="break-words">{{$menu['name']}}</span>
                            @if ($menu['sub'] != [])
                                <svg id="icon_mobil{{$menu['id']}}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor" class="ico_seta">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            @endif
                        </a>

                        @if ($menu['sub'] != [])
                            <div id="submenu_mobil{{$menu['id']}}" class="submenu_mobil" style="display: none">
                                <ul class="">
                                    @foreach ( $menu['sub'] as $sub)
                                        <li>
                                            <a href="{{ route($sub['route'])}}" >{{$sub['name']}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </li>

                @endforeach
            </ul>
        </div>
    </div>
   </div>



@include('js.menuchave',['idmenu' => "menu", 'idbody' => "body_app"])

<script type="text/javascript">

    let get= document.getElementById("botao-search-input");

    get.addEventListener("keydown", (e) =>{

    if(e.key == ""){

        get.disabled = false;

    }

    else if(e.key == "Enter"){

        get.disabled = true;

    }

    })

    let getmobil = document.getElementById("botao-search-input-mobil");

    getmobil.addEventListener("keydown", (e) =>{

    if(e.key == ""){

        getmobil.disabled = false;

    }

    else if(e.key == "Enter"){

        getmobil.disabled = true;

    }

    })

</script>
