<div>
    <!-- Modal Adicionar Artigo -->
   <div id="{{ $idmodal }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
       <div class="relative w-full max-w-2xl max-h-full">
           <!-- Modal content -->
           <div class="relative bg-white rounded-lg shadow dark:bg-red-700">
               <!-- Modal header -->
               <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-red-600 bg-red-200">
                   <h3 class="text-xl font-semibold text-red-900 dark:text-white">
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
                    <h3 class="text-[16pt] text-red-900">Deseja apagar o registro:</h3>
                    @isset($idfile)
                        <p><b>ID: </b>{{ $idfile ?? ""}}</p>
                    @endisset
                    @isset($title)
                    <p><b>Nome: </b>{{ $title ?? ""}}</p>
                    @endisset
                    @isset($texto)
                    <p><b>texto: </b>{{ $texto ?? ""}}</p>
                    @endisset
                    @isset($publicdate)
                    <p><b>Data de Publicação: </b>{{ $publicdate ?? ""}}</p>
                    @endisset
                    @isset($grupo)
                    <p><b>Pertençe ao grupo: </b>{{ $grupo ?? ""}}</p>
                    @endisset
                    @isset($img)
                        <img src="{{$img}}" alt="" class="w-[250px]">
                    @endisset
               </div>
               <!-- Modal footer -->
               <div class="flex items-center p-6 space-x-2 border-t bg-red-200  border-red-600 rounded-b dark:border-gray-600">
                   <a @if(!empty($route)) href="{{ route($route)}}" @else href="#" @endif data-modal-hide="{{ $idmodal }}" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Excluir</a>
                   {{-- <button data-modal-hide="{{ $idmodal }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Salvar</button> --}}
                   <button data-modal-hide="{{ $idmodal }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
               </div>
           </div>red
       </div>
   </div>
</div>
