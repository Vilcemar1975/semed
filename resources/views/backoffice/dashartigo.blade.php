<x-app-layout>

    <x-slot name="header">
        <h2 class="flex font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Artigos') }}
        </h2>
        <div class="flex gap-2 uppercase text-[9pt] mt-2">
            <a class="text-gray-500" href="{{route('dashartigo')}}">{{ __('Artigos') }}</a>
        </div>
    </x-slot>
    <x-slot name="menuleft">
        @include('components.menu.menu_dashboard',['dados' => $dados['menudashbord']])
    </x-slot>

    @include('components.backoffice.title', ['title' => "Gestão de Artigos"])

    {{-- @livewire('article-show') --}}

    <div>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="flex gap-1 mt-2" class="flex">
            {{-- @include('components.botao.verde_a',['title' => "Artigo", 'route' => "dashartigoadd", 'icon' => "fa-solid fa-plus text-[12pt] pt-1 pr-2"]) --}}
            @include('components.botao.bt_modal', ['title' => "Artigo", 'txtcor' => "white", 'bg' => "green", 'modal' => "AddArticleModal", 'icon' => "fa-solid fa-plus text-[12pt] pt-1 pr-2"])

            <div class="flex flex-nowrap w-full">
                <input type="search" name="pesquisa" id="pesquisa"
                class="w-full text-azul-100 py-2 px-3 border border-azul-100 rounded-s-md"
                placeholder="Pesquisar"
                >
                <button type="button" class="block relative w-[48px]  bg-azul-100 hover:bg-azul-500 border border-azul-100 rounded-e-md">
                    <i class="fa-solid fa-magnifying-glass text-white"></i>
                </button>

            </div>
            <button type="button" id="button_filtro" onclick="filtro()" class="block hover:bg-azul-400 bg-azul hover:text-azul-100 text-white uppercase text-[12pt] px-3 py-2 rounded-md">Filtrar</button>
        </div>
        @include('components.backoffice.filter')

        {{-- @livewire('plug.list-modulo', [
            'heads' => $articleheads,
            'lists' => $articles,
            'public' => $publics,

                    'modal_public' => "EditArticleModal",
                    'modal_edit' => "EditArticleModal",
                    'modal_excluir' => "ModalExcluirGrupo",
                    //'route_edit' => "",

        ]) --}}

        {{-- Lista --}}
        <div class="relative overflow-x-auto mt-3 border border-azul-100 sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-azul-100 uppercase bg-azul-400 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="">
                        <th scope="col" class="px-3 py-2">
                            ID
                        </th>
                        <th scope="col" class="px-3 py-2">
                            TITULO
                        </th>
                        <th scope="col" class="px-3 py-2 text-end">
                            PUBLICAR / EDITAR / EXCLUIR
                        </th>
                    </tr>
                </thead>
                <tbody class=" h-[600px] overflow-hidden list-padrao-clear">
                    @foreach ($artigos as $list)

                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-azul-400 dark:hover:bg-gray-600">

                            <td class="px-3 py-2">
                                {{ $list->id }}
                            </td>

                            <td class="px-3 py-2">
                                {{ $list->title }}
                            </td>

                            <td class="px-3 py-2 flex justify-end items-center">

                                @if ($list->status['public'] == "public")
                                    <button id="btn_public" class=" px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-green-500 hover:bg-green-600 rounded-s-lg"
                                    data-modal-target="PublicArticleModal" data-modal-toggle="PublicArticleModal" onclick="statusF(['{{ implode("','", $list->status ) }}'],'{{ $list->id }}')"><i class="fa-solid fa-check"></i></button>
                                @endif
                                @if ($list->status['public'] == "public_day")
                                    <button id="btn_public" class=" px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-teal-600 hover:bg-teal-600 rounded-s-lg"
                                    data-modal-target="PublicArticleModal" data-modal-toggle="PublicArticleModal" onclick="statusF(['{{ implode("','", $list->status ) }}'],'{{ $list->id }}')"><i class="fa-solid fa-clock-rotate-left"></i></button>
                                @endif
                                @if ($list->status['public'] == "no_public")
                                    <button id="btn_public" class=" px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-gray-500 hover:bg-gray-600 rounded-s-lg"
                                    data-modal-target="PublicArticleModal" data-modal-toggle="PublicArticleModal" onclick="statusF(['{{ implode("','", $list->status ) }}'],'{{ $list->id }}')"><i class="fa-solid fa-xmark"></i></button>
                                @endif
                                {{-- <button class=" px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-orange-500 hover:bg-orange-600 rounded-s-lg"
                                    data-modal-target="EditArticleModal" data-modal-toggle="EditArticleModal"><i class="fa-solid fa-screwdriver-wrench"></i></button> --}}

                                {{-- <button class=" px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-blue-700 hover:bg-blue-900"
                                data-modal-target="ModalEditGrupo" data-modal-toggle="ModalEditGrupo"><i class="fa-solid fa-pen-to-square"></i></button> --}}

                                <a href="{{route('articleedit', ['id' =>  $list->id ])}}" class="px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-blue-700 hover:bg-blue-900"><i class="fa-solid fa-pen-to-square"></i></a>

                                {{-- <button class=" px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-red-600 hover:bg-red-900 rounded-br-lg rounded-tr-lg"
                                data-modal-target="ModalLixeiraArtigo" data-modal-toggle="ModalLixeiraArtigo"><i class="fa-regular fa-trash-can"></i></button> --}}

                                <a href="{{route('articletrash', ['id' =>  $list->id ])}}" class=" px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-red-600 hover:bg-red-900 rounded-br-lg rounded-tr-lg">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a>

                            </td>


                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>

        {{-- Paginação --}}
        @include('components.paginate', [
            'dados' => $artigos,
        ])

        <!-- Modal Adicionar Artigo -->
        <div id="AddArticleModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t bg-azul-400">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Criar Artigo
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="AddArticleModal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{ route('dashartigoadd')}}" method="get">
                        @csrf
                        <div class="block p-6 space-y-6">
                                @include('components.backoffice.fildText', ['idname' => "title", 'label' => "Titulo", 'max' => 0 , 'min' => 0])
                                @include('components.backoffice.fildselect', ['idname' => "category", 'label' => "Categoria", 'lista' => $dados['listsite']])
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                            {{-- <a href=""  data-modal-hide="AddArticleModal" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Criar</a> --}}
                            <button data-modal-hide="AddArticleModal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Criar</button>
                            <button data-modal-hide="AddArticleModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Publicar Artigo -->
        <div id="PublicArticleModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t bg-azul-400">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Publicar Artigo
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="PublicArticleModal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{ route('articlePublic')}}" method="get">
                        @csrf
                        <div class="p-2">
                            <div class="block  mt-3 w-full">
                                @include('components.backoffice.label',['idname' => 'status','label' => "Status"])
                                <div class="block border p-3  rounded-lg  border-azul ">
                                    @include('components.backoffice.fildratius', ['idid' => "public_c", 'idname' => "public_c", 'label' => "Publicar", 'value' => "public"])
                                    <div id="public_date_time" class="text-azul-100">
                                        @include('components.backoffice.fildratius', ['idid' => "public_day_c", 'idname' => "public_c", 'label' => "Publicar Depois ", 'value' => "public_day"])

                                        <div id="datas_probramadas_c">
                                            <div class="flex gap-2 justify-end items-center mb-2">
                                                <p>Inicio</p>
                                                <input type="date" name="date_start_c" id="date_start_c" value="" class="rounded-lg border border-azul-100 text-azul-100 text-[10pt]">
                                                <p class="mt-3 text-azul-100 font-semibold uppercase text-[9pt]"> as </p>
                                                <input type="time" name="hour_start_c" id="hour_start_c" value="" class="rounded-lg border border-azul-100 text-azul-100 text-[10pt]">
                                            </div>
                                            <div class="flex gap-2 justify-center items-cente mb-2">
                                                <p>Data Para Término?</p>
                                                <input id="checkteminio_c"  name="checkteminio_c" type="checkbox" class="border border-azul-100 rounded-sm">
                                            </div>
                                            <div id="data_termino_c" class="flex gap-2 justify-end">
                                                <input type="date" name="date_end_c" id="date_end_c" value="" class="rounded-lg border border-azul-100 text-azul-100 text-[10pt]">
                                                <p class="text-azul-100 font-semibold uppercase text-[9pt]"> as </p>
                                                <input type="time" name="hour_end_c" id="hour_end_c" value="" class="rounded-lg border border-azul-100 text-azul-100 text-[10pt]">
                                            </div>
                                        </div>

                                    </div>
                                    @include('components.backoffice.fildratius', ['idid' => "no_public_c", 'idname' => "public_c", 'label' => "Não Publicar", 'value' => "no_public"])
                                    <input type="text" name="status_id_c" id="status_id_c" class="hidden">
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                            {{-- <a href=""  data-modal-hide="PublicArticleModal" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Criar</a> --}}
                            <button data-modal-hide="PublicArticleModal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Alterar</button>
                            <button data-modal-hide="PublicArticleModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>

            var c_public = document.getElementById('public_c');
            var c_public_day = document.getElementById('public_day_c');
            var c_date_start = document.getElementById('date_start_c');
            var c_date_end = document.getElementById('date_end_c');
            var c_hour_start = document.getElementById('hour_start_c');
            var c_hour_end = document.getElementById('hour_end_c');
            var c_no_public = document.getElementById('no_public_c');
            var c_checkteminio = document.getElementById('checkteminio_c');
            var c_datas_probramadas = document.getElementById('datas_probramadas_c');
            var c_data_termino = document.getElementById('data_termino_c');
            var c_status_id = document.getElementById('status_id_c');

            function statusF(status, idarticle){

                let listPublic = [status[1] == 'public' ? true:false, status[1] == 'public_day' ? true:false, status[1] == 'no_public' ? true:false];

                c_public.checked = listPublic[0];
                c_public_day.checked = listPublic[1];
                c_date_start.value = status[4];
                c_date_end.value = status[2];
                c_hour_start.value = status[5];
                c_hour_end.value = status[3];
                c_no_public.checked = listPublic[2];
                c_checkteminio.checked = listPublic[1];
                c_status_id.value = idarticle;

                verificaPublicDay_c();
                verificaTeminiData_c();

                return;

            }

        document.addEventListener('DOMContentLoaded', function() {
         verificaPublicDay_c();
         document.getElementById('public_day_c').addEventListener('change', verificaPublicDay_c);

        });

        document.addEventListener('DOMContentLoaded', function() {
        verificaTeminiData_c();
        document.getElementById('checkteminio_c').addEventListener('change', verificaTeminiData_c);

        });

        document.getElementById('public_c').addEventListener('click', function () {
            c_datas_probramadas.style.display = 'none';
            limparDataHora_c();

        });


        document.getElementById('no_public_c').addEventListener('click', function () {
            c_datas_probramadas.style.display = 'none';
            limparDataHora_c();
        });

        function verificaPublicDay_c() {
            // Verifica se o radio button está marcado
            if (c_public_day.checked) {
                // Torna a div visível
                c_datas_probramadas.style.display = 'block';
            } else {
                // Torna a div oculta
                c_datas_probramadas.style.display = 'none';
            }
        }

        function verificaTeminiData_c() {

            // Verifica se o radio button está marcado
            if (c_checkteminio.checked) {
                // Torna a div visível
                c_data_termino.style.display = 'flex';
            } else {
                // Torna a div oculta
                c_data_termino.style.display = 'none';
            }

        }

        function limparDataHora_c(){

            c_date_start.value = "";
            c_date_end.value = "";
            c_hour_start.value = "";
            c_hour_end.value = "";
            c_data_termino.style.display = 'none';
            c_checkteminio.checked = false;

            return;
        }

        </script>



    </div>


</x-app-layout>
