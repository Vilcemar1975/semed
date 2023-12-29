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
                    <form action="{{route('createupdateauthor', ['uid' => $uid])}}">
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
                                <label for="company" class="w-full self-center uppercase text-azul-100 text-[10pt] font-semibold">Categoria</label>
                                <select name="category_author" id="category_author">
                                    <option value="grafico">Gráfico</option>
                                    <option value="Image">Imagem</option>
                                    <option value="tabela">Tabela</option>
                                    <option value="texto">Texto</option>
                                    <option value="video">Vídeo</option>
                                </select>
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
