<div>
    <form action="{{ route('articlesave', ['id' => $artigo->id]) }}" method="POST">
        @csrf
        <div class="flex gap-2 justify-between text-azul-100 py-3 px-2 mt-2 bg-azul-400 rounded-md">
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
                @include('components.backoffice.fildselect', ['idname' => "author", 'label' => "Autor", 'selected' => $autor ,'lista' => $autores])
                <button type="button" data-modal-target="CreatorModel" data-modal-toggle="CreatorModel"
                        class="flex phone:w-['48px'] flex-nowrap bg-lime-600 hover:bg-lime-800 text-white py-2 px-2 mt-8 rounded-md uppercase">
                        <i class="fa-solid fa-plus"></i>
                </button>
            </div>
            @include('components.backoffice.fildselect', ['idname' => "category", 'label' => "Categoria", 'selected' => $categoria ,'lista' => $categorias])

        </div>
        <div class="flex gap-2 justify-between w-full mt-2">
            @include('components.backoffice.label',['idname' => "",'label' => "Lista de topicos do artigo"])
            @include('components.botao.bt_modal', ['title' => "Adicionar", 'txtcor' => "white", 'bg' => "green", 'modal' => "AddArticleModal", 'icon' => "fa-regular fa-plus text-[16pt] pr-2"])
        </div>

       @livewire('plug.list-modulo', [
            'heads' => $topicheads,
            'lists' => $topics,
            'modal_public' => "EditArticleModal",
            'modal_edit' => "EditArticleModal",
            'modal_excluir' => "ModalExcluirGrupo",

        ])

        <div class="flex gap-2">
            @include('components.backoffice.status', [
                'public' => $status['public'],
                'public_day' => $status['public_day'],
                'date_start' => $status['date_start'],
                'date_end' => $status['date_end'],
                'hour_start' => $status['hour_start'],
                'hour_end' => $status['hour_end'],
                'no_public' => $status['no_public'],
            ])

            @include('components.backoffice.configuracoes', [
                'show_author' => $config['show_author'],
                'show_day_public' => $config['show_day_public'],
                'show_description' => $config['show_description'],
                'show_url' => $config['show_url'],
                'show_download' => $config['show_download'],
                'show_day_alteration' =>$config['show_day_alteration'],
                'show_author_photo' => $config['show_author_photo'],
                'show_share' => $config['show_share'],
                'show_print' => $config['show_print'],
            ])

        </div>
        <div class="flex gap-2 justify-between">
            @include('components.backoffice.fildcheck', ['idname' => "detach", 'label' => "Destacar", 'checked' => $artigo->highlight])
            @include('components.backoffice.fildselect', ['idname' => "position_spasion", 'label' => "Posição Especial", 'lista' => $position_spacials, 'selected' => $position_esp])
            @include('components.backoffice.fildselect', ['idname' => "acess", 'label' => "Acesso", 'lista' => $acessos, 'selected' => $acesso])
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
                <form action="{{route('topicsave',[ 'id' =>  $artigo->id ])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="block p-6 space-y-6">
                        <div class="flex justify-around gap-3 mx-auto">
                            <div class="text-center">
                                <label for="tipotopico"><img src="{{asset('storage/icons/sotxt.svg')}}" alt="Somente Texto" ></label>
                                <input type="radio" name="position_txtimg" id="tipotopico" value="1" onclick="habilitarButton(this.checked, '1')">
                            </div>
                            <div class="text-center">
                                <label for="tipotopico2"><img src="{{asset('storage/icons/imgtxt.svg')}}" alt="Somente Texto" ></label>
                                <input type="radio" name="position_txtimg" id="tipotopico2" value="2" checked onclick="habilitarButton(false,'2')">
                            </div>
                            <div class="text-center">
                                <label for="tipotopico3"><img src="{{asset('storage/icons/textimg.svg')}}" alt="Somente Texto" ></label>
                                <input type="radio" name="position_txtimg" id="tipotopico3" value="3" checked onclick="habilitarButton(false,'3')">
                            </div>
                            <div class="text-center">
                                <label for="tipotopico4"><img src="{{asset('storage/icons/textimgtop.svg')}}" alt="Somente Texto" ></label>
                                <input type="radio" name="position_txtimg" id="tipotopico4" value="4" onclick="habilitarButton(false,'4')">
                            </div>
                            <div class="text-center">
                                <label for="tipotopico5"><img src="{{asset('storage/icons/soimg.svg')}}" alt="Somente Texto" ></label>
                                <input type="radio" name="position_txtimg" id="tipotopico5" value="5" onclick="habilitarButton(false,'5')">
                            </div>
                        </div>
                        <div class="block text-center w-full">
                            @include('components.backoffice.label',['idname' => 'text','label' => "Imagem"])
                            <hr class="my-2">
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
                                    @include('components.backoffice.fildselect', ['idname' => "classification", 'label' => "Classificação", 'lista' => $classificacoes])
                                    @include('components.backoffice.fildselect', ['idname' => "typo_topic", 'label' => "Tipo da Imagem", 'lista' => $typeimg])
                                </div>
                            </div>

                            <div class="flex w-full gap-1 justify-center items-center">
                                @include('components.backoffice.fildselect', ['idname' => "author_topic", 'label' => "Autor da Imagem", 'selected' => $autor ,'lista' => $autores])
                                <button type="button" data-modal-target="CreatorModel" data-modal-toggle="CreatorModel"
                                        class="flex phone:w-['48px'] flex-nowrap bg-lime-600 hover:bg-lime-800 text-white py-2 px-2 mt-8 rounded-md uppercase">
                                        <i class="fa-solid fa-plus"></i>
                                </button>
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
        function habilitarButton(value, num) {

            var fileInput = document.getElementById('image');
            var labelInput = document.getElementById('imglabel');
            var containertexto = document.getElementById('containertexto');
            console.log(labelInput);

            fileInput.disabled = value;

            if (value) {
                labelInput.className = "px-2 py-2 text-center m-auto bg-gray-200 hover:bg-gray-400 rounded-lg uppercase text-[9pt] font-semibold";
            }else{
                labelInput.className = "px-2 py-2 text-center m-auto bg-green-200 hover:bg-green-400 rounded-lg uppercase text-[9pt] font-semibold";
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
                        Alterar Texto ou Imagem
                    </h3>
                    <button type="button" class="text-blue-400 bg-transparent hover:bg-blue-900 hover:text-blue-400 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="EditArticleModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="" method="POST" autocomplete="on" enctype="multipart/form-data">
                    @csrf
                    <div class="block p-6 space-y-6">
                        <div class="flex justify-around gap-3 mx-auto">
                            <div class="text-center">
                                <label for="tipotopico_edit"><img src="{{asset('storage/icons/sotxt.svg')}}" alt="Somente Texto" ></label>
                                <input type="radio" name="position_txtimg_edit" id="tipotopico_edit" value="1" onclick="habilitarButton(this.checked, '1')">
                            </div>
                            <div class="text-center">
                                <label for="tipotopico_edit2"><img src="{{asset('storage/icons/imgtxt.svg')}}" alt="Imagem Texto" ></label>
                                <input type="radio" name="position_txtimg_edit" id="tipotopico_edit2" value="2" checked onclick="habilitarButton(false,'2')">
                            </div>
                            <div class="text-center">
                                <label for="tipotopico_edit3"><img src="{{asset('storage/icons/textimg.svg')}}" alt="Texto Imagem" ></label>
                                <input type="radio" name="position_txtimg_edit" id="tipotopico_edit3" value="3" checked onclick="habilitarButton(false,'3')">
                            </div>
                            <div class="text-center">
                                <label for="tipotopico_edit4"><img src="{{asset('storage/icons/textimgtop.svg')}}" alt="Imagem no Topo Texto" ></label>
                                <input type="radio" name="position_txtimg_edit" id="tipotopico_edit4" value="4" onclick="habilitarButton(false,'4')">
                            </div>
                            <div class="text-center">
                                <label for="tipotopico_edit5"><img src="{{asset('storage/icons/soimg.svg')}}" alt="Somente Imagem" ></label>
                                <input type="radio" name="position_txtimg_edit" id="tipotopico_edit5" value="5" onclick="habilitarButton(false,'5')">
                            </div>
                        </div>
                        <div class="block text-center w-full">
                            @include('components.backoffice.label',['idname' => 'text','label' => "Imagem"])
                            <img src="{{asset('storage/padrao/img.jpeg')}}" alt="" id="img_preview" class="w-[24rem] mx-auto mb-3">
                            <label id="imglabel_edit" for="image_edit" class="px-2 py-2 text-center m-auto bg-green-200 hover:bg-green-400 rounded-lg uppercase text-[9pt] font-semibold">Selecione a Imagem</label>
                            <input type="file" name="image_edit" id="image_edit" accept="image/png, image/jpeg" class="hidden">
                        </div>
                        @include('components.backoffice.fildText', ['idname' => "textimg_edit", 'label' => "Texto Abaixo da Imagem (opcional)", 'max' => 0 , 'min' => 0])

                        <div id="containertexto_edit">
                            @include('components.backoffice.fildText', ['idname' => "titlemodel_edit", 'label' => "Titulo", 'max' => 0 , 'min' => 0])
                            <div class="block">
                                @include('components.backoffice.label',['idname' => 'text_edit','label' => "Texto"])
                                <textarea name="text" id="text" placeholder="Digite aqui seu texto" class="block w-full border border-azul-100 rounded-lg text-[10pt]"></textarea>
                            </div>
                        </div>

                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b bg-blue-200">
                        <button data-modal-hide="EditArticleModal" type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Salvar</button>
                        <button data-modal-hide="EditArticleModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Cancelar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        function habilitarButton(value, num) {

            var fileInput = document.getElementById('image_edit');
            var labelInput = document.getElementById('imglabel_edit');
            var containertexto = document.getElementById('containertexto_edit');

            fileInput.disabled = value;

            if (value) {
                labelInput.className = "px-2 py-2 text-center m-auto bg-gray-200 hover:bg-gray-400 rounded-lg uppercase text-[9pt] font-semibold";
            }else{
                labelInput.className = "px-2 py-2 text-center m-auto bg-green-200 hover:bg-green-400 rounded-lg uppercase text-[9pt] font-semibold";
            }

            if (num == '5') {
                containertexto.style.display = "none";
            }else{
                containertexto.style.display = "block";
            }
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
                <form wire:submit="SavarCreator">
                    <div class="p-6 space-y-6">

                        <div>
                            <label for="menu_full" class="w-full self-center uppercase text-azul-100 text-[10pt] font-semibold">Nome Completo:</label>
                            <input class="p-2 rounded-lg w-full border-azul-100" wire:model="name_full" type="text" />
                        </div>
                        <div>
                            <label for="company" class="w-full self-center uppercase text-azul-100 text-[10pt] font-semibold">Empresa:</label>
                            <input class="p-2 rounded-lg w-full border-azul-100" wire:model="company" type="text" />
                        </div>
                        <div>
                            <label for="description" class="w-full self-center uppercase text-azul-100 text-[10pt] font-semibold">Descrição:</label>
                            <textarea class="p-2 rounded-lg w-full border-azul-100" wire:model="description"></textarea>
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




