<div>
    <!-- Modal Editar Artigo -->{{--  --}}
    <div id="{{ $idmodal }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t bg-green-200">
                    <h3 class="text-xl font-semibold text-gray-900">
                        {{$titletop}}
                    </h3>
                    <button type="button" class="text-green-400 bg-transparent hover:bg-green-900 hover:text-green-400 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="{{ $idmodal }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <div class="flex justify-between gap-3">
                        <figure class="max-w-lg">
                            <img class="h-auto max-w-full rounded-lg" src="{{ asset('storage/padrao/img.jpeg')}}" alt="image description">
                            <figcaption class="mt-2 text-[8pt] text-center text-gray-500">Imagem deve ter o tamanho de 200x200cm, com no maximo 1024 kb.</figcaption>
                          </figure>
                        <div class="w-full">
                            @include('components.backoffice.fildText', ['idname' => "linktile", 'label' => "Titulo", 'max' => 0 , 'min' => 0])
                            @include('components.backoffice.fildText', ['idname' => "link", 'label' => "Link", 'max' => 0 , 'min' => 0])
                        </div>
                    </div>
                    <div class="flex justify-between gap-3">
                        @include('components.backoffice.fieldswich', [
                                'idfild' => "public",
                                'label' => "Publicar",
                                'checked' => false,
                            ])
                        @include('components.backoffice.fildselect', ['idname' => "category", 'label' => "Categoria", 'lista' => []])
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b bg-green-200">
                    <button data-modal-hide="{{ $idmodal }}" type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Salvar</button>
                    <button data-modal-hide="{{ $idmodal }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>

