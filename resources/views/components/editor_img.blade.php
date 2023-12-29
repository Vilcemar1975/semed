<div id="EditorImgModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t bg-azul-400">
                <h3 class="text-xl font-semibold text-gray-900">
                    Editar Informações da Imagem
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="EditorImgModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal Editar Informações da Imagem -->
            <form action="{{route('saveimg', ['uid' => $uid])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="block p-6 space-y-6">
                    <img id="previw_img" src="{{asset('storage/padrao/img.jpeg')}}" alt="" class="block h-[200px] mx-auto rounded-md">
                    @include('components.backoffice.fildText', ['idname' => "title_img", 'type' => "text", 'label' => "Tittulo", 'value' => "",'max' => 0 , 'min' => 0])
                    {{-- @include('components.backoffice.fildText', ['idname' => "author_img", 'type' => "text", 'label' => "Autor da Imagem", 'value' => "",'max' => 0 , 'min' => 0]) --}}
                    <div class="flex w-full gap-1 justify-center items-center">
                        @include('components.backoffice.fildselect', ['idname' => "author", 'label' => "Autor", 'selected' => $autor ,'lista' => $criadores])
                        <button type="button" data-modal-target="CreatorModel" data-modal-toggle="CreatorModel"
                                class="flex phone:w-['48px'] flex-nowrap bg-lime-600 hover:bg-lime-800 text-white py-2 px-2 mt-8 rounded-md uppercase" onclick="pegarUid()">
                                <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                    <div class="flex tablet:flex-wrap justify-between gap-2">
                        @include('components.backoffice.fildselect', ['idname' => "category_img", 'label' => "Categoria", 'lista' => $dados['type']])
                        @include('components.backoffice.fildselect', ['idname' => "classification_img", 'label' => "Classificação", 'lista' => $dados['classifications']])
                    </div>
                    @include('components.backoffice.fildText', ['idname' => "source_img", 'type' => "text", 'label' => "Fonte (opcional)", 'value' => "",'max' => 0 , 'min' => 0])
                    <div class="block">
                        @include('components.backoffice.label',['idname' => 'text_img','label' => "Descrição"])
                        <textarea name="description_img" id="description_img" placeholder="Digite aqui seu texto" class="block w-full border border-azul-100 rounded-lg text-[10pt]">{{$escola->description}}</textarea>
                    </div>

                    <input type="hidden" id="uid_img" name="uid_img" >
                    <input type="hidden" id="uid_author_img" name="uid_author_img" >

                </div>

                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                    <button data-modal-hide="EditorImgModal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Alterar</button>
                    <button data-modal-hide="EditorImgModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Cancelar</button>
                </div>
            </form>

            {{-- Botão de delete --}}
            <div id="deletar_img" class="w-full p-3 text-end">
                <form id="frmDelete"  method="GET" target="_self">
                    @csrf
                    <button type="submit" class="text-white bg-red-700 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg border border-red-200 text-sm font-medium px-5 py-2.5 hover:text-white focus:z-10">Deletar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Criar Autor -->
<div id="CreatorModel" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t bg-blue-200">
                <h3 class="text-xl font-semibold text-blue-900">
                    Criar Autor
                </h3>
                <button type="button" class="text-blue-900 bg-transparent hover:bg-blue-600 hover:text-white rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="CreatorModel">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Fechar Modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{route('createupdateauthor')}}">
                @csrf
                <div class="p-6 space-y-6">

                    <div>
                        <label for="menu_full" class="w-full self-center uppercase text-azul-100 text-[10pt] font-semibold">Nome Completo:</label>
                        <input id="name_full" name="name_full" class="p-2 rounded-lg w-full border-azul-100" type="text" />
                    </div>
                    <div>
                        <label for="company" class="w-full self-center uppercase text-azul-100 text-[10pt] font-semibold">Empresa:</label>
                        <input id="company" name="company" class="p-2 rounded-lg w-full border-azul-100" wire:model="company" type="text" />
                    </div>
                    <div>
                        <label for="description" class="w-full self-center uppercase text-azul-100 text-[10pt] font-semibold">Descrição:</label>
                        <textarea id="description" name="description" class="p-2 rounded-lg w-full border-azul-100"></textarea>
                    </div>

                    <input type="hidden" id="autor_uid" name="autor_uid">

                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b bg-blue-200">
                    <button data-modal-hide="CreatorModel" type="submit" class="text-white bg-lime-700 hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-lime-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sim</button>
                    <button data-modal-hide="CreatorModel" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Não</button>
                </div>
            </form>
        </div>
    </div>

</div>

<script>
    function pegarUid() {
        let uidAuthorImg = document.getElementById('uid_author_img').value;
        document.getElementById('autor_uid').value = uidAuthorImg;
    }
</script>
