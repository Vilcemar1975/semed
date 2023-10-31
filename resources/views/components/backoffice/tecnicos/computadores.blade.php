<div>
    <div class="flex gap-1 mt-2" class="flex">
        {{-- @include('components.botao.verde_a',['title' => "Artigo", 'route' => "dashartigoadd", 'icon' => "fa-solid fa-plus text-[12pt] pt-1 pr-2"]) --}}
        @include('components.botao.bt_modal', ['title' => "DISPOSITIVO", 'txtcor' => "white", 'bg' => "green", 'modal' => "ModalAddGrupo", 'icon' => "fa-solid fa-plus text-[12pt] pt-1 pr-2"])

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
        'heads' => ['id', 'Patrimonio', 'N/S', 'Localidade', 'MP/Editar/Excluir'],
        'lists' => [
                    ['1', '12345', '12345', 'Texto composição teste para conferir'],
                    ['2', '12345', '12345', 'Texto composição teste para conferir'],
                    ['3', '12345', '12345', 'Texto composição teste para conferir'],
                    ['4', '12345', '12345', 'Texto composição teste para conferir'],
                    ['5', '12345', '12345', 'Texto composição teste para conferir'],
                    ['6', '12345', '12345', 'Texto composição teste para conferir'],
                    ['7', '12345', '12345', 'Texto composição teste para conferir'],
                    ['8', '12345', '12345', 'Texto composição teste para conferir'],
                    ['9', '12345', '12345', 'Texto composição teste para conferir'],
                    ['10', '12345', '12345', 'Texto composição teste para conferir'],
                    ['1', '12345', '12345', 'Texto composição teste para conferir'],
                    ['2', '12345', '12345', 'Texto composição teste para conferir'],
                    ['3', '12345', '12345', 'Texto composição teste para conferir'],
                    ['4', '12345', '12345', 'Texto composição teste para conferir'],
                    ['5', '12345', '12345', 'Texto composição teste para conferir'],
                    ['6', '12345', '12345', 'Texto composição teste para conferir'],
                    ['7', '12345', '12345', 'Texto composição teste para conferir'],
                    ['8', '12345', '12345', 'Texto composição teste para conferir'],
                    ['9', '12345', '12345', 'Texto composição teste para conferir'],
                    ['10', '12345', '12345', 'Texto composição teste para conferir'],
        ],
        'config' => true,

        ])


</div>


 <!-- Modal Adicionar Objeto -->
 <div id="ModalAddGrupo" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t bg-green-100">
                <h3 class="text-xl font-semibold text-green-700">
                    Adicionar Dispositivo
                </h3>
                <button type="button" class="text-green-600 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="ModalAddGrupo">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="block p-6 space-y-6 max-h-[600px] list-padrao-clear overflow-auto">
                <div class="flex gap-2 phone:flex-wrap justify-between">
                    <div class="block text-center">
                        @include('components.backoffice.label',['idname' => 'text','label' => "Imagem do Dispositivo"])
                        <img src="{{asset('storage/padrao/img.jpeg')}}" alt="" id="img_preview" class="w-[24rem] mx-auto mb-3 rounded-lg">
                        <label id="imglabel" for="image" class="px-2 py-2 text-center m-auto bg-green-200 hover:bg-green-400 rounded-lg uppercase text-[9pt] font-semibold">Selecione a Imagem</label>
                        <input type="file" name="image" id="image" accept="image/png, image/jpeg" class="hidden">
                    </div>
                    <div class="w-full">
                        @include('components.backoffice.fildselect', ['idname' => "objeto", 'label' => "Objeto", 'max' => 0 , 'min' => 0, 'lista' => ['Desktop - Computador de Mesa','Laptop','tablet','swith','roteador']])
                        @include('components.backoffice.fildText', ['idname' => "patrimonio", 'label' => "Patrimônio", 'max' => 0 , 'min' => 0])
                    </div>
                </div>
                <div class="flex gap-2 phone:flex-wrap justify-between">
                    <div class="w-full">
                        @include('components.backoffice.fildText', ['idname' => "modelo", 'label' => "Modelo", 'max' => 0 , 'min' => 0])
                    </div>
                    <div class="w-full">
                        @include('components.backoffice.fildText', ['idname' => "serialnumber", 'label' => "Numero de Serie", 'max' => 0 , 'min' => 0])
                    </div>
                </div>
                <div class="flex gap-2 phone:flex-wrap justify-between">
                    @include('components.backoffice.fildText', ['idname' => "nomemaquina", 'label' => "Nome do Dispositivo", 'max' => 0 , 'min' => 0])
                    @include('components.backoffice.fildText', ['idname' => "ipmaquina", 'label' => "IP do Dispositivo", 'max' => 0 , 'min' => 0])
                </div>

                <div class="block w-full mt-2">

                    @include('components.backoffice.label',['idname' => "instituicao",'label' => "Instituição"])
                    <select name="local" id="local"
                        class="w-full rounded-md border-azul-100 self-center text-azul-100"
                    >
                        <option value="">Escola que está localizado</option>
                        <option value="">Escola que está localizado</option>
                        <option value="">Escola que está localizado</option>
                        <option value="">Escola que está localizado</option>
                        <option value="">Escola que está localizado</option>

                    </select>
                </div>
                @include('components.backoffice.fildText', ['idname' => "setor", 'label' => "Setor", 'max' => 0 , 'min' => 0])

                @include('components.backoffice.fildTextArea', ['idname' => "object", 'label' => "Observaçao", 'max' => 0 , 'min' => 0])

            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t bg-green-100 border-gray-200 rounded-b">
                {{-- <a href="#"  data-modal-hide="ModalAddGrupo" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Criar</a> --}}
                <button data-modal-hide="ModalAddGrupo" type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Salvar</button>
                <button data-modal-hide="ModalAddGrupo" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Cancelar</button>
            </div>
        </div>
    </div>
</div>

 <!-- Modal Editar Objeto -->
<div id="ModalEditGrupo" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t bg-blue-100">
                <h3 class="text-xl font-semibold text-blue-800">
                    Editar Dispositivo
                </h3>
                <button type="button" class="text-blue-600 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="ModalEditGrupo">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="block p-6 space-y-6">
                <div>
                    @include('components.backoffice.fildselect', ['idname' => "objeto", 'label' => "Objeto", 'max' => 0 , 'min' => 0, 'lista' => ['Desktop','Laptop','tablet','swith','roteador']])
               </div>
                <div class="flex gap-2 phone:flex-wrap justify-between">
                    <div>
                        @include('components.backoffice.fildText', ['idname' => "patrimonio", 'label' => "Patrimônio", 'max' => 0 , 'min' => 0])
                    </div>
                    <div>
                        @include('components.backoffice.fildText', ['idname' => "modelo", 'label' => "Modelo", 'max' => 0 , 'min' => 0])
                    </div>
                    <div>
                        @include('components.backoffice.fildText', ['idname' => "serialnumber", 'label' => "Numero de Serie", 'max' => 0 , 'min' => 0])
                    </div>
                </div>

                <div class="block w-full mt-2">

                    @include('components.backoffice.label',['idname' => "local",'label' => "Local"])
                    <select name="local" id="local"
                        class="w-full rounded-md border-azul-100 self-center text-azul-100"
                    >
                        <option value="">Escola que está localizado</option>
                        <option value="">Escola que está localizado</option>
                        <option value="">Escola que está localizado</option>
                        <option value="">Escola que está localizado</option>
                        <option value="">Escola que está localizado</option>

                    </select>
                </div>
                @include('components.backoffice.fildTextArea', ['idname' => "object", 'label' => "Observaçao", 'max' => 0 , 'min' => 0])
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t bg-azul-400 border-gray-200 rounded-b">
                {{-- <a href="#"  data-modal-hide="ModalEditGrupo" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Criar</a> --}}
                <button data-modal-hide="ModalEditGrupo" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Alterar</button>
                <button data-modal-hide="ModalEditGrupo" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Excluir Excluir -->
<div id="ModalExcluirGrupo" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t bg-red-100">
                <h3 class="text-xl font-semibold text-red-800">
                    Excluir Dispositivo
                </h3>
                <button type="button" class="text-red-600 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="ModalExcluirGrupo">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="block p-6 space-y-6 overflow-hidden">
                <h3 class="text-[20pt] text-red-900">Deseja excluir esse dispositivo?</h3>
                <p class="text-[12pt]"><b>ID:</b> 9999999</p>
                <p class="text-[12pt]"><b>Patrimonio:</b> 9999999</p>
                <p class="text-[12pt]"><b>Num. Série:</b> 9999999</p>
                <p class="text-[12pt]"><b>Modelo:</b> 9999999</p>
                <p class="text-[12pt]"><b>Local:</b> Nome da Escola</p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t bg-red-100 border-gray-200 rounded-b">
                {{-- <a href="#"  data-modal-hide="ModalExcluirGrupo" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Criar</a> --}}
                <button data-modal-hide="ModalExcluirGrupo" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Excluir</button>
                <button data-modal-hide="ModalExcluirGrupo" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Cancelar</button>
            </div>
        </div>
    </div>
</div>
