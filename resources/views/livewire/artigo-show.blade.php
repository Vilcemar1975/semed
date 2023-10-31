<div>
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

    @livewire('plug.list-modulo', [
        'heads' => ['id' => "id", 'titulo' => 'Titulo',  'action' => "Publicado/Editar/Excluir"],
        'lists' => [

                    ['id' => "1", 'title' => "Texto composição teste para conferir", 'public'=> true],
                    ['id' => "2", 'title' => "Texto composição teste para conferir", 'public'=> true],
                    ['id' => "3", 'title' => "Texto composição teste para conferir", 'public'=> false],
                    ['id' => "4", 'title' => "Texto composição teste para conferir", 'public'=> true],
                    ['id' => "5", 'title' => "Texto composição teste para conferir", 'public'=> true],
                    ['id' => "6", 'title' => "Texto composição teste para conferir", 'public'=> true],
                    ['id' => "7", 'title' => "Texto composição teste para conferir", 'public'=> false],
                    ['id' => "8", 'title' => "Texto composição teste para conferir", 'public'=> true],
                    ['id' => "9", 'title' => "Texto composição teste para conferir", 'public'=> true],
                    ['id' => "10", 'title' => "Texto composição teste para conferir", 'public'=> true],


                ],

                'modal_public' => "EditArticleModal",
                'modal_edit' => "EditArticleModal",
                'modal_excluir' => "ModalExcluirGrupo",
                //'route_edit' => "",

    ])



    {{-- @livewire('plug.modal-artigo-add', [
        'idmodal' => "AddArticleModal",
        'titletop' => "Cria Artigo",
        'title' => "",
        'route' => "dashartigoadd",
        ]) --}}

    <div>
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
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</div>
