<div>
    <div class="flex gap-1 mt-2" class="flex">
        <a href="{{ route('dashconfig')}}" class="p-3 text-azul border border-azul hover:bg-azul-400 rounded-md"><i class="fa-solid fa-arrow-left-long"></i></a>
        {{-- @include('components.botao.verde_a',['title' => "Artigo", 'route' => "dashartigoadd", 'icon' => "fa-solid fa-plus text-[12pt] pt-1 pr-2"]) --}}
        @include('components.botao.bt_modal', ['title' => "Grupo", 'txtcor' => "white", 'bg' => "green", 'modal' => "ModalAddGrupo", 'icon' => "fa-solid fa-plus text-[12pt] pt-1 pr-2"])

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

    <div class="block w-full  border border-azul-100 mt-2 p-3 rounded-lg overflow-hidden">
        <div class="flex bg-azul-400 rounded-md mt-2 text-azul-100">
            <h3 class="block w-[4rem] self-center pl-3 font-semibold">ID</h3>
            <h3 class="block w-full  self-center pl-3 font-semibold">Nome</h3>
            <h3 class="block w-[4rem]  self-center pl-3 font-semibold">Public</h3>
            <h3 class="block w-[4rem]  self-center pl-3 font-semibold">Editar</h3>
            <h3 class="block w-[4rem]  self-center pl-3 font-semibold">Excluir</h3>
        </div>
        <div class="list-padrao-clear max-h-[25rem]">
            @for ($b=0; $b < 12; $b++)
                <div class="flex border hover:border-azul-100 hover:bg-azul-400 rounded-lg mt-2">
                    <h3 class="block w-[4rem] text-gray-500 hover:text-azul-100 self-center pl-3 font-semibold">{{$b}}</h3>
                    <h3 class="block w-full  text-gray-500 hover:text-azul-100 self-center pl-3 font-semibold">Titulo do Grupo</h3>
                    @if ($b % 2 == 1)
                        <a href="#" class="block w-[4rem] text-center text-white text-[14pt] bg-green-500 hover:bg-green-600 rounded-s-lg">
                            <i class="fa-solid fa-check"></i>
                        </a>
                    @else
                        <a href="#" class="block w-[4rem] text-center text-white text-[14pt] bg-gray-500 hover:bg-gray-600 rounded-s-lg">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    @endif

                    <button class="block w-[4rem] text-center text-white text-[14pt] bg-blue-700 hover:bg-blue-900"
                    data-modal-target="ModalEditGrupo" data-modal-toggle="ModalEditGrupo"
                    ><i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="block w-[4rem] text-center text-white text-[14pt] bg-red-600 hover:bg-red-900 rounded-br-lg rounded-tr-lg"
                    data-modal-target="ModalExcluirGrupo" data-modal-toggle="ModalExcluirGrupo"
                    ><i class="fa-regular fa-trash-can"></i></button>

                </div>
            @endfor
        </div>

    </div>
    <div class="block w-full mt-2">
        <nav aria-label="Page navigation example w-full">
            <ul class="flex justify-center items-center -space-x-px h-8 text-sm w-full">
                <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Previous</span>
                        <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                        </svg>
                    </a>
                </li>
                @for ($t=1; $t < 13; $t++)
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{$t}}</a>
                    </li>
                @endfor
                <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Next</span>
                        <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Modal Adicionar Grupo -->
   <div id="ModalAddGrupo" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600 bg-green-100">
                    <h3 class="text-xl font-semibold text-green-700 dark:text-white">
                        Criar Grupo
                    </h3>
                    <button type="button" class="text-green-600 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="ModalAddGrupo">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="block p-6 space-y-6">
                    @include('components.backoffice.fildText', ['idname' => "title", 'label' => "Nome", 'max' => 0 , 'min' => 0])
                    @include('components.backoffice.fildTextArea', ['idname' => "object", 'label' => "Descrição", 'max' => 0 , 'min' => 0])

                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    {{-- <a href="#"  data-modal-hide="ModalAddGrupo" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Criar</a> --}}
                    <button data-modal-hide="ModalAddGrupo" type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Salvar</button>
                    <button data-modal-hide="ModalAddGrupo" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

     <!-- Modal Editar Grupo -->
    <div id="ModalEditGrupo" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600 bg-blue-100">
                    <h3 class="text-xl font-semibold text-blue-800 dark:text-white">
                        Editar Grupo
                    </h3>
                    <button type="button" class="text-blue-600 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="ModalEditGrupo">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="block p-6 space-y-6">
                    @include('components.backoffice.fildText', ['idname' => "title", 'label' => "Nome", 'max' => 0 , 'min' => 0])
                    @include('components.backoffice.fildTextArea', ['idname' => "object", 'label' => "Descrição", 'max' => 0 , 'min' => 0])

                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    {{-- <a href="#"  data-modal-hide="ModalEditGrupo" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Criar</a> --}}
                    <button data-modal-hide="ModalEditGrupo" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Alterar</button>
                    <button data-modal-hide="ModalEditGrupo" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Excluir Grupo -->
    <div id="ModalExcluirGrupo" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600 bg-red-100">
                    <h3 class="text-xl font-semibold text-red-800 dark:text-white">
                        Excluir Grupo
                    </h3>
                    <button type="button" class="text-red-600 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="ModalExcluirGrupo">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="block p-6 space-y-6 overflow-hidden">
                    <h3 class="text-[20pt] text-red-900">Deseja excluir o grupo?</h3>
                    <p class="text-[12pt]"><b>ID:</b> 9999999</p>
                    <p class="text-[12pt]"><b>Nome:</b> Nome do Grupo</p>
                    <p class="text-[10pt] text-ellipsis overflow-hidden ..."><b>Descrição:</b> Texto do grupo asçldkaçslkdçkasçdlkalçksdçkaçk</p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    {{-- <a href="#"  data-modal-hide="ModalExcluirGrupo" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Criar</a> --}}
                    <button data-modal-hide="ModalExcluirGrupo" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Excluir</button>
                    <button data-modal-hide="ModalExcluirGrupo" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

</div>
