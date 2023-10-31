<div>
    <!-- Modal Editar Artigo -->{{--  --}}
    <div id="{{ $idmodal }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t bg-green-200">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Alterar {{$titletop}}
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
                    <div class="flex gap-2 justify-between">
                        <div class="block border border-azul-100 px-3 px-1 rounded-lg">
                            @include('components.backoffice.label',['idname' => 'text','label' => "ID"])
                            <p class="text-azul-marinho">{{ $idfile }}</p>
                        </div>
                        <div class="block border border-azul-100 px-3 px-1 rounded-lg w-full">
                            @include('components.backoffice.label',['idname' => 'text','label' => "Titulo"])
                            <p class="text-azul-marinho">{{$title}}</p>
                        </div>
                        <div class="block border border-azul-100 px-3 px-1 rounded-lg">
                            @include('components.backoffice.label',['idname' => 'text','label' => "Publicação"])
                            <p class="text-azul-marinho">{{$publicdate}}</p>
                        </div>
                        <div class="block border border-azul-100 px-3 px-1 rounded-lg">
                            @include('components.backoffice.label',['idname' => 'text','label' => "Grupo"])
                            <p class="text-azul-marinho">{{$grupo}}</p>
                        </div>
                    </div>
                    <div class="block text-center w-full">
                        @include('components.backoffice.label',['idname' => 'text','label' => "Imagem que vai no texto"])
                        <img @if($img != "") src="{{asset($img)}}" @else src="{{asset('storage/padrao/img.jpeg')}}" @endif alt="" id="img_preview" class="w-[24rem] mx-auto mb-3">
                        <label for="image" class="px-2 py-2 text-center m-auto bg-green-200 hover:bg-green-400 rounded-lg uppercase text-[9pt] font-semibold">Selecione a Imagem</label>
                        <input type="file" name="image" id="image" accept="image/png, image/jpeg" class="hidden">
                    </div>
                    <hr>
                    <div class="block">
                        @include('components.backoffice.label',['idname' => 'text','label' => "Texto"])
                        <textarea name="text" id="text" placeholder="Digite aqui seu texto" class="block w-full border border-azul-100 rounded-lg text-[10pt]">{{$texto}}</textarea>
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
