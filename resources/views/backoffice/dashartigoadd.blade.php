<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Artigos') }}
        </h2>
        <div class="flex gap-2 uppercase text-[9pt] mt-2">
            <a class="text-gray-500" href="{{route('dashartigo')}}">{{ __('Artigos') }} ></a>
            <a class="text-gray-500" href="{{route('dashartigoadd')}}">{{ __('Adicionar Artigos') }}</a>
        </div>
    </x-slot>
    <x-slot name="menuleft">
        @include('components.menu.menu_dashboard',['dados' => $dados['menudashbord']])
    </x-slot>

    @include('components.backoffice.title', ['title' => "Adicionar Artigos"])

    {{-- @livewire('article-edit', ['artigo' => $artigo, 'categorias' => $dados['listsite'], 'position_spacials' => $dados['position_spacial'], 'acessos' => $dados['acess']]) --}}

    <div>
        <form action="{{ route('articlesave', ['id' => $artigo->uid]) }}" method="POST">
            @csrf
            <div class="flex gap-2 justify-between text-azul-100 py-3 px-2 mt-2 bg-azul-400 rounded-md">
                <div>
                    <b>UID Artigo:</b>
                    <span>{{ $artigo->uid }}</span>
                </div>
                <div>
                    <b>ID Artigo:</b>
                    <span>{{ $artigo->id }}</span>
                </div>
                <div>
                    <b>ID Grupo:</b>
                    <span>{{ $artigo->id_group }}</span>
                </div>
                <div>
                    <b>ID Usuário:</b>
                    <span>{{ $artigo->id_user }}</span>
                </div>
                <div>
                    <b>Apelido:</b>
                    <span>{{ $artigo->nickname }}</span>
                </div>
            </div>
            <div class="flex gap-2 justify-between">
                @include('components.backoffice.fildText', ['idname' => "title", 'label' => "Titulo", 'value' => $artigo->title, 'max' => 0 , 'min' => 0])
                @include('components.backoffice.fildText', ['idname' => "subtitle", 'label' => "Subtitulo", 'value' => $artigo->subtitle,'max' => 0 , 'min' => 0])
            </div>
            <div class="flex gap-2 justify-between items-end">
               {{--  @include('components.backoffice.fildText', ['idname' => "author", 'label' => "Autor", 'value' => $autor, 'max' => 0 , 'min' => 0]) --}}

                <div class="flex w-full gap-1 justify-center items-center">
                    @include('components.backoffice.fildselect', ['idname' => "author", 'label' => "Autor", 'selected' => $autor ,'lista' => $criadores])
                    <button type="button" data-modal-target="CreatorModel" data-modal-toggle="CreatorModel"
                            class="flex phone:w-['48px'] flex-nowrap bg-lime-600 hover:bg-lime-800 text-white py-2 px-2 mt-8 rounded-md uppercase">
                            <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
                @include('components.backoffice.fildselect', ['idname' => "category", 'label' => "Categoria", 'selected' => $categoria ,'lista' => $dados['listsite']])

            </div>
            <div class="flex gap-2 justify-between w-full mt-2">
                @include('components.backoffice.label',['idname' => "",'label' => "Lista de topicos do artigo"])
                @include('components.botao.bt_modal', ['title' => "Adicionar", 'txtcor' => "white", 'bg' => "green", 'modal' => "AddArticleModal", 'icon' => "fa-regular fa-plus text-[16pt] pr-2"])
            </div>

            {{-- Lista --}}
            <div class="relative overflow-x-auto mt-3 border border-azul-100 sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-azul-100 uppercase bg-azul-400 dark:bg-gray-700 dark:text-gray-400">
                        <tr class="">
                            <th scope="col" class="px-3 py-2">
                                ID
                            </th>
                            <th scope="col" class="px-3 py-2">
                                IMAGEM
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
                        @foreach ($topicos as $list)

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-azul-400 dark:hover:bg-gray-600">

                                <td class="px-3 py-2">
                                    {{ $list->id }}
                                </td>

                                <td class="w-[16rem]">
                                    @if ($list->image->url != null)
                                        <img src="{{asset($list->image->url)}}" alt="{{ $list->image->title ?? ""}}" class="h-[5rem] rounded-md">
                                    @else
                                        <img src="{{asset('storage/padrao/img.jpeg')}}" alt="Imagem Padrao" class="h-[5rem] rounded-md">
                                    @endif
                                </td>

                                <td class="px-3 py-2 w-full">
                                    {{ $list->title }}
                                </td>

                                <td class="px-3 py-2 flex justify-end items-center">

                                    @if ($list->public)
                                        <a href="{{route('topicpublic', ['id' =>  $list->uid ])}}" class=" px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-green-500 hover:bg-green-600 rounded-s-lg"><i class="fa-solid fa-check"></i></a>

                                    @else
                                        <a href="{{route('topicpublic', ['id' =>  $list->uid ])}}" class=" px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-gray-500 hover:bg-gray-600 rounded-s-lg"><i class="fa-solid fa-xmark"></i></a>
                                    @endif


                                    <button type="button" class=" px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-blue-700 hover:bg-blue-900"
                                        data-modal-target="EditArticleModal" data-modal-toggle="EditArticleModal"
                                        onclick="cargaTopic(['{{$list->id}}','{{$list->uid}}','{{$list->id_articles}}','{{$list->uid_from_who}}','{{$list->position}}','{{$list->title}}','{{$list->text}}','{{$list->public}}','{{$artigo->id_group}}'],['{{ $list->image->id ?? ''}}','{{ $list->image->uid ?? ''}}','{{ $list->image->id_author ?? ''}}','{{ $list->image->title ?? ''}}','{{ $list->image->url ?? ''}}','{{ $list->image->classification ?? ''}}','{{ $list->image->type ?? ''}}','{{ $list->image->description ?? ''}}'])">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>


                                    {{-- <a href="{{route('articleedit', ['id' =>  $list->id ])}}" class="px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-blue-700 hover:bg-blue-900"><i class="fa-solid fa-pen-to-square"></i></a> --}}

                                    {{-- <button class=" px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-red-600 hover:bg-red-900 rounded-br-lg rounded-tr-lg"
                                    data-modal-target="ModalLixeiraArtigo" data-modal-toggle="ModalLixeiraArtigo"><i class="fa-regular fa-trash-can"></i></button> --}}

                                    <a href="{{route('topicerase', ['id' =>  $list->uid ])}}" class=" px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-red-600 hover:bg-red-900 rounded-br-lg rounded-tr-lg">
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
                'dados' => $topicos,
            ])

            <div class="flex gap-2">
                @include('components.backoffice.status', [
                    'public' => $status['public'] == 'public' ? true: false,
                    'public_day' => $status['public'] == 'public_day' ? true: false,
                    'date_start' => $status['date_start'],
                    'date_end' => $status['date_end'],
                    'hour_start' => $status['hour_start'],
                    'hour_end' => $status['hour_end'],
                    'no_public' => $status['public'] == 'no_public' ? true: false,
                ])

                @include('components.backoffice.configuracoes', [
                    'show_author' => $configs['show_author'],
                    'show_day_public' => $configs['show_day_public'],
                    'show_description' => $configs['show_description'],
                    'show_url' => $configs['show_url'],
                    'show_download' => $configs['show_download'],
                    'show_day_alteration' =>$configs['show_day_alteration'],
                    'show_author_photo' => $configs['show_author_photo'],
                    'show_share' => $configs['show_share'],
                    'show_print' => $configs['show_print'],
                ])

            </div>
            <div class="flex gap-2 justify-between">
                @include('components.backoffice.fildcheck', ['idname' => "detach", 'label' => "Destacar", 'checked' => $artigo->highlight])
                @include('components.backoffice.fildselect', ['idname' => "position_spasion", 'label' => "Posição Especial", 'lista' => $dados['position_spacial'], 'selected' => $position_esp])
                @include('components.backoffice.fildselect', ['idname' => "acess", 'label' => "Acesso", 'lista' => $dados['acess'], 'selected' => $acess ])
            </div>
            <br>
            <div class="flex flex-wrap gap-2 justify-end">
                @include('components.botao.cinza_a', ["title" => "Voltar", 'route' => "dashartigo"])
                @include('components.botao.verde', ["title" => "Salvar", 'type' => "submit"])
            </div>
        </form>
        <br>

        <!-- Modal Adicionar topic Artigo -->
        <div id="AddArticleModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t bg-azul-400">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Adicionar Topico
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="AddArticleModal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{route('topicsave',[ 'id' =>  $artigo->uid ])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="block p-6 space-y-6">
                            <div class="flex justify-around gap-3 mx-auto">
                                <div class="text-center">
                                    <label for="tipotopico"><img src="{{asset('storage/icons/sotxt.svg')}}" alt="Somente Texto" ></label>
                                    <input type="radio" name="position_txtimg" id="tipotopico" value="1" onclick="habilitarButtonAdd(this.checked, '1')">
                                </div>
                                <div class="text-center">
                                    <label for="tipotopico2"><img src="{{asset('storage/icons/imgtxt.svg')}}" alt="Somente Texto" ></label>
                                    <input type="radio" name="position_txtimg" id="tipotopico2" value="2" checked onclick="habilitarButtonAdd(false,'2')">
                                </div>
                                <div class="text-center">
                                    <label for="tipotopico3"><img src="{{asset('storage/icons/textimg.svg')}}" alt="Somente Texto" ></label>
                                    <input type="radio" name="position_txtimg" id="tipotopico3" value="3" checked onclick="habilitarButtonAdd(false,'3')">
                                </div>
                                <div class="text-center">
                                    <label for="tipotopico4"><img src="{{asset('storage/icons/textimgtop.svg')}}" alt="Somente Texto" ></label>
                                    <input type="radio" name="position_txtimg" id="tipotopico4" value="4" onclick="habilitarButtonAdd(false,'4')">
                                </div>
                                <div class="text-center">
                                    <label for="tipotopico5"><img src="{{asset('storage/icons/soimg.svg')}}" alt="Somente Texto" ></label>
                                    <input type="radio" name="position_txtimg" id="tipotopico5" value="5" onclick="habilitarButtonAdd(false,'5')">
                                </div>
                            </div>
                            <div class="block text-center w-full">
                                @include('components.backoffice.label',['idname' => 'text','label' => "Imagem"])
                                <hr class="my-2">
                                <div id="display_img" class="flex flex-col" >
                                    <div class="flex justify-between gap-2 ">
                                        <div class="text-center">
                                            <img src="{{asset('storage/padrao/img.jpeg')}}" alt="" id="img_preview" class="w-[24rem] h-[11rem] mb-3">
                                            <label id="imglabel" for="image" class="px-2 py-2 text-center m-auto bg-green-200 hover:bg-green-400 rounded-lg uppercase text-[9pt] font-semibold">Selecione a Imagem</label>
                                            <input type="file" name="image" id="image" accept="image/png, image/jpeg" class="hidden" onchange="previewImage(this)">
                                            <input type="text" name="id_group_topic" id="id_group_topic" value="{{$artigo->id_group}}" class="hidden">
                                            <input type="text" name="id_category_topic" id="id_category_topic" value="{{$artigo->category}}" class="hidden">
                                        </div>

                                        <div class="">
                                            @include('components.backoffice.fildText', ['idname' => "textimg", 'label' => "Texto Abaixo da Imagem (opcional)", 'max' => 0 , 'min' => 0])
                                            @include('components.backoffice.fildselect', ['idname' => "classification", 'label' => "Classificação", 'lista' => $dados['classifications']])
                                            @include('components.backoffice.fildselect', ['idname' => "typo_topic", 'label' => "Tipo da Imagem", 'lista' => $dados['type']])
                                        </div>
                                    </div>
                                    <div class="flex w-full gap-1 justify-center items-center">
                                        @include('components.backoffice.fildselect', ['idname' => "author_topic", 'label' => "Autor da Imagem", 'selected' => $autor ,'lista' => $criadores])
                                        <button type="button" data-modal-target="CreatorModel" data-modal-toggle="CreatorModel"
                                                class="flex phone:w-['48px'] flex-nowrap bg-lime-600 hover:bg-lime-800 text-white py-2 px-2 mt-8 rounded-md uppercase">
                                                <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </div>

                                </div>


                            </div>
                            <hr>

                            <div id="containertexto">
                                @include('components.backoffice.fildText', ['idname' => "titlemodel", 'label' => "Titulo", 'max' => 0 , 'min' => 0])
                                <div class="block">
                                    @include('components.backoffice.label',['idname' => 'text','label' => "Texto"])
                                    <textarea name="text" id="text" placeholder="Digite aqui seu texto" class="block w-full border border-azul-100 rounded-lg text-[10pt]"></textarea>
                                </div>
                            </div>

                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                            <button data-modal-hide="AddArticleModal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Salvar</button>
                            <button data-modal-hide="AddArticleModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            function habilitarButtonAdd(value, num) {

                var fileInput = document.getElementById('image');
                var labelInput = document.getElementById('imglabel');
                var containertexto = document.getElementById('containertexto');
                var display_img = document.getElementById('display_img');


                fileInput.disabled = value;

                if (value) {
                    labelInput.className = "px-2 py-2 text-center m-auto bg-gray-200 hover:bg-gray-400 rounded-lg uppercase text-[9pt] font-semibold";
                }else{
                    labelInput.className = "px-2 py-2 text-center m-auto bg-green-200 hover:bg-green-400 rounded-lg uppercase text-[9pt] font-semibold";
                }

                if (num == '1') {
                    display_img.style.display = "none";
                }else{
                    display_img.style.display = "flex";
                }


                if (num == '5') {
                    containertexto.style.display = "none";
                }else{
                    containertexto.style.display = "block";
                }
            }

            function previewImage(input) {
                var imgPreview = document.getElementById('img_preview');
                var imgLabel = document.getElementById('imglabel');

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        imgPreview.src = e.target.result;
                    };

                    reader.readAsDataURL(input.files[0]);

                    imgLabel.innerText = 'Imagem selecionada';
                } else {
                    imgPreview.src = "{{ asset('storage/padrao/img.jpeg') }}";
                    imgLabel.innerText = 'Selecione a Imagem';
                }
            }

        </script>

        <!-- Modal Editar Artigo -->
        <div id="EditArticleModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t bg-blue-200">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Alterar Topicos
                        </h3>
                        <button type="button" class="text-blue-400 bg-transparent hover:bg-blue-900 hover:text-blue-400 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="EditArticleModal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{route('topicalter',[ 'id' =>  $artigo->uid ])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="block p-6 space-y-6">
                            <div class="flex justify-around gap-3 mx-auto">
                                <div class="text-center">
                                    <label for="tipotopico"><img src="{{asset('storage/icons/sotxt.svg')}}" alt="Somente Texto" ></label>
                                    <input type="radio" name="position_txtimg" id="tipotopicoedit" value="1" onclick="habilitarButtonEdit(this.checked, '1')">
                                </div>
                                <div class="text-center">
                                    <label for="tipotopico2"><img src="{{asset('storage/icons/imgtxt.svg')}}" alt="Somente Texto" ></label>
                                    <input type="radio" name="position_txtimg" id="tipotopicoedit2" value="2" checked onclick="habilitarButtonEdit(false,'2')">
                                </div>
                                <div class="text-center">
                                    <label for="tipotopico3"><img src="{{asset('storage/icons/textimg.svg')}}" alt="Somente Texto" ></label>
                                    <input type="radio" name="position_txtimg" id="tipotopicoedit3" value="3" checked onclick="habilitarButtonEdit(false,'3')">
                                </div>
                                <div class="text-center">
                                    <label for="tipotopico4"><img src="{{asset('storage/icons/textimgtop.svg')}}" alt="Somente Texto" ></label>
                                    <input type="radio" name="position_txtimg" id="tipotopicoedit4" value="4" onclick="habilitarButtonEdit(false,'4')">
                                </div>
                                <div class="text-center">
                                    <label for="tipotopico5"><img src="{{asset('storage/icons/soimg.svg')}}" alt="Somente Texto" ></label>
                                    <input type="radio" name="position_txtimg" id="tipotopicoedit5" value="5" onclick="habilitarButtonEdit(false,'5')">
                                </div>
                            </div>
                            <div class="block text-center w-full">

                                <div id="display_img_edit" class="flex flex-col ">
                                    @include('components.backoffice.label',['idname' => 'text_edit','label' => "Imagem"])
                                    <hr class="my-2">
                                    <div class="flex justify-between gap-2 " >
                                        <div class="text-center">
                                            <img src="{{asset('storage/padrao/img.jpeg')}}" alt="" id="img_preview_edit" class="w-[24rem] h-[11rem] mb-3">
                                            <label id="imglabel_edit" for="image_edit" class="px-2 py-2 text-center m-auto bg-green-200 hover:bg-green-400 rounded-lg uppercase text-[9pt] font-semibold">Selecione a Imagem</label>
                                            <input type="file" name="image_edit" id="image_edit" accept="image/png, image/jpeg" class="hidden" onchange="previewImageEdit(this)">
                                            <input type="text" name="id_group_topic" id="id_group_topic_edit" value="{{$artigo->id_group}}" class="hidden">
                                            <input type="text" name="id_category_topic" id="id_category_topic_edit" value="{{$artigo->category}}" class="hidden">
                                            <input type="text" name="id_topic" id="id_topic" value="" class="hidden">
                                            <input type="text" name="uid_topic" id="uid_topic" value="" class="hidden">
                                            <input type="text" name="id_topic_img" id="id_topic_img" value="" class="hidden">
                                            <input type="text" name="uid_topic_img" id="uid_topic_img" value="" class="hidden">
                                        </div>

                                        <div class="">
                                            @include('components.backoffice.fildText', ['idname' => "textimg_edit", 'label' => "Texto Abaixo da Imagem (opcional)", 'max' => 0 , 'min' => 0])
                                            @include('components.backoffice.fildselect', ['idname' => "classification_edit", 'label' => "Classificação", 'lista' => $dados['classifications']])
                                            @include('components.backoffice.fildselect', ['idname' => "typo_topic_edit", 'label' => "Tipo da Imagem", 'lista' => $dados['type']])
                                        </div>
                                    </div>
                                    <div class="flex w-full gap-1 justify-center items-center">
                                        @include('components.backoffice.fildselect', ['idname' => "author_topic_edit", 'label' => "Autor da Imagem", 'selected' => $autor ,'lista' => $criadores])
                                        <button type="button" data-modal-target="CreatorModel" data-modal-toggle="CreatorModel"
                                                class="flex phone:w-['48px'] flex-nowrap bg-lime-600 hover:bg-lime-800 text-white py-2 px-2 mt-8 rounded-md uppercase">
                                                <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </div>

                                </div>


                            </div>
                            <hr>

                            <div id="containertexto_edit">
                                @include('components.backoffice.fildText', ['idname' => "titlemodel_edit", 'label' => "Titulo", 'max' => 0 , 'min' => 0])
                                <div class="block">
                                    @include('components.backoffice.label',['idname' => 'text_edit','label' => "Texto"])
                                    <textarea name="text" id="text_edit" placeholder="Digite aqui seu texto" class="block w-full border border-azul-100 rounded-lg text-[10pt]"></textarea>
                                </div>
                            </div>

                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                            <button data-modal-hide="EditArticleModal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Salvar</button>
                            <button data-modal-hide="EditArticleModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Cancelar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <script>

            var tipotopicoedit = document.getElementById('tipotopicoedit');
            var tipotopicoedit2 = document.getElementById('tipotopicoedit2');
            var tipotopicoedit3 = document.getElementById('tipotopicoedit3');
            var tipotopicoedit4 = document.getElementById('tipotopicoedit4');
            var tipotopicoedit5 = document.getElementById('tipotopicoedit5');

            var img_preview_edit = document.getElementById('img_preview_edit');
            var id_group_topic_edit = document.getElementById('id_group_topic_edit');
            var id_category_topic = document.getElementById('id_category_topic');
            var textimg_edit = document.getElementById('textimg_edit');
            var classification_edit = document.getElementById('classification_edit');
            var typo_topic_edit = document.getElementById('typo_topic_edit');
            var author_topic_edit = document.getElementById('author_topic_edit');
            var id_topic = document.getElementById('id_topic');
            var uid_topic = document.getElementById('uid_topic');

            var text_edit = document.getElementById('text_edit');
            var titlemodel_edit = document.getElementById('titlemodel_edit');

            var fileInput = document.getElementById('image_edit');
            var labelInput = document.getElementById('imglabel_edit');
            var containertexto = document.getElementById('containertexto_edit');
            var display_img = document.getElementById('display_img_edit');



            function habilitarButtonEdit(value, num) {


                fileInput.disabled = value;

                if (value) {
                    labelInput.className = "px-2 py-2 text-center m-auto bg-gray-200 hover:bg-gray-400 rounded-lg uppercase text-[9pt] font-semibold";
                }else{
                    labelInput.className = "px-2 py-2 text-center m-auto bg-green-200 hover:bg-green-400 rounded-lg uppercase text-[9pt] font-semibold";
                }

                if (num == '1') {
                    display_img.style.display = "none";
                }else{
                    display_img.style.display = "flex";
                }


                if (num == '5') {
                    containertexto.style.display = "none";
                }else{
                    containertexto.style.display = "block";
                }

            }

            function previewImageEdit(input) {

                var imgPreview = document.getElementById('img_preview_edit');
                var imgLabel = document.getElementById('imglabel_edit');

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        imgPreview.src = e.target.result;
                    };

                    reader.readAsDataURL(input.files[0]);

                    imgLabel.innerText = 'Imagem selecionada';
                } else {
                    imgPreview.src = "{{ asset('storage/padrao/img.jpeg') }}";
                    imgLabel.innerText = 'Selecione a Imagem';
                }
            }

            function cargaTopic(params, imgem) {
                console.log([params, imgem]);
                //Disposição do testo e imagem.
                switch (+params[4]) {
                    case 1:
                        tipotopicoedit.checked = true;
                        display_img.style.display = "none";
                        containertexto.style.display = "block";
                        break;
                    case 2:
                        tipotopicoedit2.checked = true;
                        display_img.style.display = "flex";
                        containertexto.style.display = "block";
                        break;
                    case 3:
                        tipotopicoedit3.checked = true;
                        display_img.style.display = "flex";
                        containertexto.style.display = "block";
                        break;
                    case 4:
                        tipotopicoedit4.checked = true;
                        display_img.style.display = "flex";
                        containertexto.style.display = "block";
                        break;
                    case 5:
                        tipotopicoedit5.checked = true;
                        display_img.style.display = "flex";
                        containertexto.style.display = "none";
                        break;
                    default:
                        break;
                }

                if (imgem[0] != "") {
                    let img = "{{ asset('%d') }}".replace('%d', imgem[4]) ;
                    img_preview_edit.src = img;
                    textimg_edit.value = imgem[7];
                    classification_edit.value = imgem[5];
                    typo_topic_edit.value = imgem[6];
                    author_topic_edit.value = imgem[2];
                    id_topic_img.value = imgem[0];
                    uid_topic_img.value = imgem[1];
                }

                id_topic.value = params[0];
                uid_topic.value = params[1];
                id_group_topic_edit.value = params[7];
                titlemodel_edit.value = params[5];
                text_edit.value = params[6];

            }

        </script>

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
                    <form action="{{route('criarcriador', ['id' => $artigo->uid])}}">
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

    </div>

</x-app-layout>
