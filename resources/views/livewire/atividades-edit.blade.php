<div>
    <div class="flex gap-2 justify-between">
        @include('components.backoffice.fildText', ['idname' => "title", 'label' => "Titulo", 'max' => 0 , 'min' => 0])

    </div>
    <div class="flex gap-2 justify-between">
        @include('components.backoffice.fildText', ['idname' => "subtitle", 'label' => "Subtitulo", 'max' => 0 , 'min' => 0])
        @include('components.backoffice.fildselect', ['idname' => "category", 'label' => "Categoria", 'dados' => []])
    </div>
    <div class="flex gap-2 justify-between w-full mt-2">
        @include('components.backoffice.label',['idname' => "",'label' => "Lista de Questões"])

        <div class="flex gap-2 mx-auto mt-2 w-full">
            <div class="flex flex-nowrap w-full">
                    <select name="list_questao" id="list_questao"
                    class="w-full rounded-s-md border-azul-100 self-center text-azul-100"
                >
                    <option value="">Selecionar Questão</option>
                    <option value="">Teste 01</option>
                    <option value="">Teste 02</option>
                    <option value="">Teste 03</option>

                </select>
                <button class="block h-[2.6rem] self-center rounded-e-md w-[48px] border-azul-100 bg-azul-100 hover:bg-azul-500 text-white"><i class="fa-solid fa-turn-down"></i></button>

            </div>

            <button type="button" data-modal-target="AddArticleModal" data-modal-toggle="AddArticleModal"
        class="block bg-green-600 hover:bg-green-800 text-white py-1 px-5 rounded-md w-[50%] self-center h-[2.6rem]">
                <i class="fa-solid fa-plus text-[16pt] pt-1 pr-2"> </i> Adicionar
            </button>
        </div>

    </div>

    <div class="block w-full max-h-[25rem] border border-azul-100 mt-2 p-3 rounded-lg overflow-hidden list-padrao-clear">
        @for ($b=0; $b < 10; $b++)
            <div class="flex border hover:border-azul-100 hover:bg-azul-400 rounded-lg mt-2">
                <img src="{{asset('storage/padrao/img.jpeg')}}" alt="" class="w-[80px] rounded-bl-lg rounded-tl-lg">
                <h3 class="block w-full  text-gray-500 hover:text-azul-100 self-center pl-3 font-semibold">Titulo do Questão</h3>
                <button class="block w-[4rem] text-center text-white text-[14pt] bg-green-500 hover:bg-green-600"
                data-modal-target="EditArticleModal" data-modal-toggle="EditArticleModal"
                ><i class="fa-solid fa-pen-to-square"></i></button>
                <button class="block w-[4rem] text-center text-white text-[14pt] bg-red-500 hover:bg-red-600 rounded-br-lg rounded-tr-lg"
                data-modal-target="DeleteArticleModal" data-modal-toggle="DeleteArticleModal"
                ><i class="fa-regular fa-trash-can"></i></button>
            </div>
        @endfor
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
        @include('components.backoffice.fildselect', ['idname' => "position_spasion", 'label' => "Posição Especial"])
        @include('components.backoffice.fildselect', ['idname' => "acess", 'label' => "Acesso"])
    </div>
    <br>
</div>

 <!-- Modal Adicionar Artigo -->
 <div id="AddArticleModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600 bg-azul-400">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Adicionar Texto e Imagem
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="AddArticleModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="block p-6 space-y-6">
                <div class="block text-center w-full">
                    @include('components.backoffice.label',['idname' => 'text','label' => "Imagem que vai no texto"])
                    <img src="{{asset('storage/padrao/img.jpeg')}}" alt="" id="img_preview" class="w-[24rem] mx-auto mb-3">
                    <label for="image" class="px-2 py-2 text-center m-auto bg-green-200 hover:bg-green-400 rounded-lg uppercase text-[9pt] font-semibold">Selecione a Imagem</label>
                    <input type="file" name="image" id="image" accept="image/png, image/jpeg" class="hidden">
                </div>
                <hr>
                <div class="block">
                    @include('components.backoffice.label',['idname' => 'text','label' => "Texto"])
                    <textarea name="text" id="text" placeholder="Digite aqui seu texto" class="block w-full border border-azul-100 rounded-lg text-[10pt]"></textarea>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="AddArticleModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Salvar</button>
                <button data-modal-hide="AddArticleModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Artigo -->
<div id="EditArticleModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600 bg-green-200">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Alterar Texto ou Imagem
                </h3>
                <button type="button" class="text-green-400 bg-transparent hover:bg-green-900 hover:text-green-400 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="EditArticleModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
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
                <div class="block text-center w-full">
                    @include('components.backoffice.label',['idname' => 'text','label' => "Imagem que vai no texto"])
                    <img src="{{asset('storage/padrao/img.jpeg')}}" alt="" id="img_preview" class="w-[24rem] mx-auto mb-3">
                    <label for="image" class="px-2 py-2 text-center m-auto bg-green-200 hover:bg-green-400 rounded-lg uppercase text-[9pt] font-semibold">Selecione a Imagem</label>
                    <input type="file" name="image" id="image" accept="image/png, image/jpeg" class="hidden">
                </div>
                <hr>
                <div class="block">
                    @include('components.backoffice.label',['idname' => 'text','label' => "Texto"])
                    <textarea name="text" id="text" placeholder="Digite aqui seu texto" class="block w-full border border-azul-100 rounded-lg text-[10pt]"></textarea>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 bg-green-200">
                <button data-modal-hide="EditArticleModal" type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Salvar</button>
                <button data-modal-hide="EditArticleModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Excluir Artigo -->
<div id="DeleteArticleModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600 bg-red-200">
                <h3 class="text-xl font-semibold text-red-900 dark:text-white">
                    Excluir Texto e Imagem
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
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 bg-red-200">
                <button data-modal-hide="DeleteArticleModal" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Sim</button>
                <button data-modal-hide="DeleteArticleModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Não</button>
            </div>
        </div>
    </div>
</div>


