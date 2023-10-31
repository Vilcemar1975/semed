<div>
    <div class="flex gap-2 justify-between">
        <div class="w-full">
            @include('components.backoffice.fildText', ['idname' => "title", 'label' => "Titulo", 'max' => 0 , 'min' => 0])
        </div>

        <div class="">
            <?php $years = range(1900, strftime("%Y", time())); arsort($years) ?>
            @include('components.backoffice.fildselect', ['idname' => "years_public", 'label' => "Ano Publicação", 'lista' => $years])
        </div>
    </div>
    <div class="flex gap-2 justify-between">
        @include('components.backoffice.fildText', ['idname' => "subtitle", 'label' => "Subtitulo", 'max' => 0 , 'min' => 0])
        <div class="flex gap-2 w-full">
            @include('components.backoffice.fildText', ['idname' => "isbn", 'label' => "ISBN", 'max' => 0 , 'min' => 0])
            @include('components.backoffice.fildselect', ['idname' => "classification", 'label' => "Classificação", 'lista' => []])
        </div>
    </div>
    <div class="flex gap-2 justify-between">
        <div class="flex gap-2 w-full">
            @include('components.backoffice.fildselect', ['idname' => "literary_genre", 'label' => "Gênero Literário", 'lista' => []])
            @include('components.backoffice.fildselect', ['idname' => "category", 'label' => "Categoria", 'lista' => []])
        </div>
        @include('components.backoffice.fildText', ['idname' => "editora", 'label' => "Editora", 'max' => 0 , 'min' => 0])
    </div>
    <div class="flex gap-2 justify-between">
        @include('components.backoffice.fildText', ['idname' => "serie", 'label' => "Série", 'max' => 0 , 'min' => 0])
        @include('components.backoffice.fildselect', ['idname' => "idioma", 'label' => "Idioma", 'lista' => []])
        @include('components.backoffice.fildText', ['idname' => "edicao", 'label' => "Edição", 'max' => 0 , 'min' => 0])
        @include('components.backoffice.fildText', ['idname' => "volume", 'label' => "Volume", 'max' => 0 , 'min' => 0])
        @include('components.backoffice.fildText', ['idname' => "paginas", 'label' => "Páginas", 'max' => 0 , 'min' => 0])
    </div>


    <div class="flex gap-2 justify-between w-full mt-2">
        <div class="">
            @include('components.backoffice.label',['idname' => "textarea_sinopse",'label' => "Imagem"])
            <div class="flex justify-between border hover:border-azul-100 hover:bg-azul-400 rounded-lg mt-2">
                <img src="{{asset('storage/padrao/img.jpeg')}}" alt="" class="w-[80px] rounded-bl-lg rounded-tl-lg">
                <h3 class="block basis-1/3 text-gray-500 hover:text-azul-100 self-center pl-3 font-semibold">Nome Imagem</h3>
                <div class=" flex w-[16rem] basis-1/4">
                    <button class="block  w-full text-center text-white text-[14pt] bg-azul-100 hover:bg-azul-500"
                        data-modal-target="LivroAddModal" data-modal-toggle="LivroAddModal"
                        >
                        <i class="fa-solid fa-arrow-up-from-bracket"></i>
                    </button>
                    <button class="block  w-full text-center text-white text-[14pt] bg-green-600 hover:bg-green-900"
                        data-modal-target="LivroEditModal" data-modal-toggle="LivroEditModal"
                        >
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button class="block  w-full text-center text-white text-[14pt] bg-red-600 hover:bg-red-900 rounded-br-lg rounded-tr-lg"
                        data-modal-target="DeleteArticleModal" data-modal-toggle="DeleteArticleModal"
                        >
                        <i class="fa-regular fa-trash-can"></i>
                    </button>
                </div>
            </div>
        </div>
        @include('components.backoffice.fildText', ['idname' => "link_img", 'label' => "Link Imagem", 'max' => 0 , 'min' => 0, 'disable' => false])
    </div>

    <div class="mt-2">
        @include('components.backoffice.label',['idname' => "textarea_sinopse",'label' => "Sinopse"])
        <textarea name="textarea_sinopse" id="textarea_sinopse" class="block w-full min-h-[25rem] max-h-[30rem] border border-azul-100 p-3 rounded-lg overflow-hidden list-padrao-clear"></textarea>
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
                    @include('components.backoffice.fildcheck_peq', ['idname' => "show_author_photo", 'label' => "Mostra Autor Fotografia"])
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
    <br>
    <div class="flex flex-wrap gap-2 justify-end">
        @include('components.botao.cinza_a', ["title" => "Cancelar", 'route' => "dashartigo"])
        @include('components.botao.verde', ["title" => "Salvar", 'type' => "submit"])
    </div>
    <br>
</div>



@livewire('plug.modal-image-add', [
    'idmodal' => "LivroAddModal",
    'idfile' => "954554",
    'titletop' => "Livro",
    'title' => "Titulo do Livro",
    'img' => "",
    'texto' => "textos",
    'publicdate' => "12/11/2023",
    'grupo' => "Noticias",
    ])


@livewire('plug.modal-image-edit', [
    'idmodal' => "LivroEditModal",
    'idfile' => "954554",
    'titletop' => "Livro",
    'title' => "Titulo do Livro",
    'img' => "",
    'texto' => "textos",
    'publicdate' => "12/11/2023",
    'grupo' => "Noticias",
    ])


<!-- Modal Excluir Artigo -->
<div id="DeleteArticleModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t bg-red-200">
                <h3 class="text-xl font-semibold text-red-900">
                    Excluir Texto e Imagem
                </h3>
                <button type="button" class="text-red-900 bg-transparent hover:bg-red-600 hover:text-white rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="DeleteArticleModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Fechar Modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="block text-center w-full">
                    @include('components.backoffice.label',['idname' => 'text','label' => "Imagem a ser excluido"])
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
                <div class="block">
                    @include('components.backoffice.label',['idname' => 'text','label' => "Texto"])
                    <div class="block w-full h-[10rem] p-2 border border-azul-100 rounded-lg text-[10pt] overflow-hidden">
                        <p class="text-ellipsis overflow-hidden">
                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                            The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b bg-red-200">
                <button data-modal-hide="DeleteArticleModal" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sim</button>
                <button data-modal-hide="DeleteArticleModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Não</button>
            </div>
        </div>
    </div>
</div>


