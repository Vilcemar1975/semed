<div>
    <div class="flex gap-2 justify-between">
        @include('components.backoffice.fildText', ['idname' => "title", 'label' => "Titulo", 'max' => 0 , 'min' => 0])
        @include('components.backoffice.fildText', ['idname' => "subtitle", 'label' => "Subtitulo", 'max' => 0 , 'min' => 0])
    </div>
    <div class="flex gap-2 justify-between">
        @include('components.backoffice.fildText', ['idname' => "author", 'label' => "Autor", 'max' => 0 , 'min' => 0])
        @include('components.backoffice.fildselect', ['idname' => "category", 'label' => "Categoria", 'lista' => []])
    </div>
    <div class="flex gap-2 justify-between">
        @include('components.backoffice.fildselect', ['idname' => "genero_literario", 'label' => "Genero Literário", 'lista' => []])
        @include('components.backoffice.fildselect', ['idname' => "universo_leitura", 'label' => "Universo da Leitura", 'lista' => []])
    </div>

    <div class="flex gap-2 w-full max-h-[25rem]  mt-2 rounded-lg overflow-hidden">
        <div class="w-full mb-2">
            @include('components.backoffice.label',['idname' => 'video','label' => "Vídeo"])
            <div class="flex border border-azul-100 hover:bg-azul-400 rounded-lg mt-2 w-full">
                <img src="{{asset('storage/padrao/img.jpeg')}}" alt="" class="w-[80px] rounded-bl-lg rounded-tl-lg">
                <h3 class="block w-full  text-gray-500 hover:text-azul-100 self-center pl-3 font-semibold">Titulo do Artigo</h3>
                <button class="block w-[4rem] text-center text-white text-[14pt] bg-azul-100 hover:bg-azul-500"
                data-modal-target="EditVideoModal" data-modal-toggle="EditVideoModal"
                ><i class="fa-solid fa-download"></i></button>
                <button class="block w-[4rem] text-center text-white text-[14pt] bg-green-500 hover:bg-green-600"
                data-modal-target="EditVideoModal" data-modal-toggle="EditVideoModal"
                ><i class="fa-solid fa-pen-to-square"></i></button>
                <button class="block w-[4rem] text-center text-white text-[14pt] bg-red-500 hover:bg-red-600 rounded-br-lg rounded-tr-lg"
                data-modal-target="DeleteArticleModal" data-modal-toggle="DeleteArticleModal"
                ><i class="fa-regular fa-trash-can"></i></button>
            </div>
            <p class="text-[9pt] text-gray-500">Vídeo deve ter no maximo 6mb.</p>
            @include('components.backoffice.fildText', ['idname' => "link_video", 'label' => "Link Video", 'max' => 0 , 'min' => 0])
            <p class="text-[9pt] text-gray-500">Links de vídeos que está em outro servidor. Ex. Youtube</p>

        </div>
        <div class="w-full mb-2">
            @include('components.backoffice.label',['idname' => 'thumbnail', 'label' => "Thumbnail"])
            <div class="flex border border-azul-100 hover:bg-azul-400 rounded-lg mt-2 w-full">
                <img src="{{asset('storage/padrao/img.jpeg')}}" alt="" class="w-[80px] rounded-bl-lg rounded-tl-lg">
                <h3 class="block w-full  text-gray-500 hover:text-azul-100 self-center pl-3 font-semibold">Titulo do Artigo</h3>
                <button class="block w-[4rem] text-center text-white text-[14pt] bg-azul-100 hover:bg-azul-500"
                data-modal-target="EditVideoModal" data-modal-toggle="EditThumbnailModal"
                ><i class="fa-solid fa-download"></i></button>
                <button class="block w-[4rem] text-center text-white text-[14pt] bg-green-500 hover:bg-green-600"
                data-modal-target="EditThumbnailModal" data-modal-toggle="EditThumbnailModal"
                ><i class="fa-solid fa-pen-to-square"></i></button>
                <button class="block w-[4rem] text-center text-white text-[14pt] bg-red-500 hover:bg-red-600 rounded-br-lg rounded-tr-lg"
                data-modal-target="DeleteArticleModal" data-modal-toggle="DeleteArticleModal"
                ><i class="fa-regular fa-trash-can"></i></button>
            </div>
            <p class="text-[9pt] text-gray-500">Imagem deve ter no maximo 1mb.</p>
            @include('components.backoffice.fildText', ['idname' => "link_image", 'label' => "Link Imagem", 'max' => 0 , 'min' => 0])
            <p class="text-[9pt] text-gray-500">Links de imagem que está em outro servidor.</p>


        </div>

    </div>

    <div class="block">
        @include('components.backoffice.fildTextArea')
    </div>

    <div class="flex gap-2">
        <div class="block  mt-3 w-full">
            @include('components.backoffice.label',['idname' => 'status','label' => "Status"])
            <div class="block border p-3  rounded-lg border border-azul ">
                @include('components.backoffice.fildratius', ['idid' => "public", 'idname' => "public", 'label' => "Publicar", 'checkted' => false ])
                <div id="public_date_time" class="flex gap-2">
                    @include('components.backoffice.fildratius', ['idid' => "public_day", 'idname' => "public", 'label' => "Publicar no dia ", 'checkted' => false ])
                    <input type="date" name="public_date" id="public_date" class="rounded-lg border border-azul-100 text-azul-100 text-[10pt]">
                    <p class="mt-3 text-azul-100 font-semibold uppercase text-[9pt]"> as </p>
                    <input type="time" name="public_time" id="public_time" class="rounded-lg border border-azul-100 text-azul-100 text-[10pt]">
                </div>
                @include('components.backoffice.fildratius', ['idid' => "no_public", 'idname' => "public", 'label' => "Não Publicar", 'checkted' => true ])
            </div>
        </div>
        <div class="block  mt-3 w-full">
            @include('components.backoffice.label',['idname' => 'config','label' => "Configuração"])
            <div class="flex justify-between border border-azul p-3  rounded-lg">
                <div class="">
                    @include('components.backoffice.fildcheck_peq', ['idname' => "show_author", 'label' => "Mostra Autor"])
                    @include('components.backoffice.fildcheck_peq', ['idname' => "show_date_public", 'label' => "Mostra Data de Publicação"])
                    @include('components.backoffice.fildcheck_peq', ['idname' => "show_object", 'label' => "Mostra Assunto"])
                    @include('components.backoffice.fildcheck_peq', ['idname' => "show_url", 'label' => "Mostra Url"])
                </div>
                <div class="">
                    @include('components.backoffice.fildcheck_peq', ['idname' => "show_download", 'label' => "Mostra Botão de Download"])
                    @include('components.backoffice.fildcheck_peq', ['idname' => "show_date_alter", 'label' => "Mostra Data de Alteração"])
                    @include('components.backoffice.fildcheck_peq', ['idname' => "show_author_video", 'label' => "Mostra Autor Video"])
                    @include('components.backoffice.fildcheck_peq', ['idname' => "show_shared", 'label' => "Mostra Compartilhamento"])
                </div>
            </div>
        </div>
    </div>
    <div class="flex gap-2 justify-between">
        @include('components.backoffice.fildcheck', ['idname' => "detach", 'label' => "Destacar"])

        @include('components.backoffice.fildselect', ['idname' => "position_spasion", 'label' => "Posição Especial", 'lista' => []])
        @include('components.backoffice.fildselect', ['idname' => "acess", 'label' => "Acesso", 'lista' => []])
    </div>
    <div>
        @include('components.backoffice.fildText', ['idname' => "Url", 'label' => "Url Botão", 'max' => 0 , 'min' => 0])
        <p class="text-[9pt] text-gray-500">Caso digite um link aqui será disponibilisado junto com o video.</p>
    </div>
    <br>
    <div class="flex flex-wrap gap-2 justify-end">
        @include('components.botao.cinza_a', ["title" => "Cancelar", 'route' => "dashartigo"])
        @include('components.botao.verde', ["title" => "Salvar", 'type' => "submit"])
    </div>
    <br>
</div>

<!-- Modal Adicionar Video -->
<div id="EditVideoModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600 bg-azul-400">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Adicionar Video
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="EditVideoModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Fechar Modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="block p-6 space-y-6">
                <div class="block text-center w-full">
                    @include('components.backoffice.label',['idname' => 'text','label' => "Video"])
                    <img src="{{asset('storage/padrao/img.jpeg')}}" alt="" id="img_preview" class="w-[24rem] mx-auto mb-3">
                    <label for="image" class="px-2 py-2 text-center m-auto bg-green-200 hover:bg-green-400 rounded-lg uppercase text-[9pt] font-semibold">Selecione a Imagem</label>
                    <input type="file" name="image" id="image" accept="image/png, image/jpeg" class="hidden">
                </div>
                <hr>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="EditVideoModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Salvar</button>
                <button data-modal-hide="EditVideoModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal Adicionar Thumbnail -->
<div id="EditThumbnailModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600 bg-azul-400">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Adicionar Thumbnail
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="EditThumbnailModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Fechar Modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="block p-6 space-y-6">
                <div class="block text-center w-full">
                    @include('components.backoffice.label',['idname' => 'text','label' => "Video"])
                    <img src="{{asset('storage/padrao/img.jpeg')}}" alt="" id="img_preview" class="w-[24rem] mx-auto mb-3">
                    <label for="image" class="px-2 py-2 text-center m-auto bg-green-200 hover:bg-green-400 rounded-lg uppercase text-[9pt] font-semibold">Selecione a Imagem</label>
                    <input type="file" name="image" id="image" accept="image/png, image/jpeg" class="hidden">
                </div>
                <hr>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="EditThumbnailModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Salvar</button>
                <button data-modal-hide="EditThumbnailModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Excluir Video e Thumbmail -->
<div id="DeleteArticleModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600 bg-red-200">
                <h3 class="text-xl font-semibold text-red-900 dark:text-white">
                    Excluir Video
                </h3>
                <button type="button" class="text-red-900 bg-transparent hover:bg-red-600 hover:text-white rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="DeleteArticleModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Fechar Modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="block text-center w-full">
                    @include('components.backoffice.label',['idname' => 'text','label' => "Video"])
                    <img src="{{asset('storage/padrao/img.jpeg')}}" alt="" id="img_preview" class="w-[15rem] mx-auto mb-3">
                </div>
                <hr>
                <div class="flex gap-2 justify-between">
                    <div class="block border border-azul-100 px-3 px-1 rounded-lg">
                        @include('components.backoffice.label',['idname' => 'text','label' => "ID"])
                        <p class="text-azul-marinho">99999</p>
                    </div>
                    <div class="block border border-azul-100 px-3 px-1 rounded-lg w-full">
                        @include('components.backoffice.label',['idname' => 'text','label' => "Titulo"])
                        <p class="text-azul-marinho">Titulo do Texto</p>
                    </div>
                    <div class="block border border-azul-100 px-3 px-1 rounded-lg">
                        @include('components.backoffice.label',['idname' => 'text','label' => "Publicação"])
                        <p class="text-azul-marinho">12/12/2002</p>
                    </div>
                    <div class="block border border-azul-100 px-3 px-1 rounded-lg">
                        @include('components.backoffice.label',['idname' => 'text','label' => "Grupo"])
                        <p class="text-azul-marinho">Noticia</p>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 bg-red-200">
                <button data-modal-hide="DeleteArticleModal" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Sim</button>
                <button data-modal-hide="DeleteArticleModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Não</button>
            </div>
        </div>
    </div>
</div>


