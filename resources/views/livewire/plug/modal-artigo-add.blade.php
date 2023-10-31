<div>
    <!-- Modal Adicionar Artigo -->
   <div id="{{ $idmodal }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
       <div class="relative w-full max-w-2xl max-h-full">
           <!-- Modal content -->
           <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
               <!-- Modal header -->
               <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600 bg-azul-400">
                   <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                       {{ $titletop }}
                   </h3>
                   <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="{{ $idmodal }}">
                       <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                       </svg>
                       <span class="sr-only">Close modal</span>
                   </button>
               </div>
               <!-- Modal body -->
               <div class="block p-6 space-y-6">
                    @include('components.backoffice.fildText', ['idname' => "title", 'label' => "Titulo", 'max' => 0 , 'min' => 0])
                    @include('components.backoffice.fildselect', ['idname' => "category", 'label' => "Categoria", 'lista' => []])
               </div>
               <!-- Modal footer -->
               <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                   <a href="{{ route($route)}}"  data-modal-hide="{{ $idmodal }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Criar</a>
                   {{-- <button data-modal-hide="{{ $idmodal }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Salvar</button> --}}
                   <button data-modal-hide="{{ $idmodal }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
               </div>
           </div>
       </div>
   </div>
</div>
