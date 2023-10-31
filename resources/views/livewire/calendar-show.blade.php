<div class="flex gap-1 mt-2" class="flex">
    @include('components.botao.bt_modal', ['title' => "Calendário", 'txtcor' => "white", 'bg' => "green", 'modal' => "AddCalendarModal", 'icon' => "fa-solid fa-plus text-[12pt] pt-1 pr-2"])
    <div class="flex flex-nowrap w-full">
        <input type="search" name="pesquisa" id="pesquisa"
        class="w-full text-azul-100 py-2 px-3 border border-azul-100 rounded-s-md"
        placeholder="Pesquisar"
        >
        <button type="button" class="block relative w-[48px]  bg-azul-100 hover:bg-azul-500 border border-azul-100 rounded-e-md" >
            <i class="fa-solid fa-magnifying-glass text-white"></i>
        </button>

    </div>
    <button type="button" id="button_filtro" onclick="filtro()" class="block hover:bg-azul-400 bg-azul hover:text-azul-100 text-white uppercase text-[12pt] px-3 py-2 rounded-md">Filtrar</button>
</div>
@include('components.backoffice.filter')

<div class="block w-full  border border-azul-100 mt-2 p-3 rounded-lg overflow-hidden">
    <div class="flex bg-azul-400 rounded-md mt-2 text-azul-100">
        <h3 class="block w-[4rem] self-center pl-3 font-semibold">ID</h3>
        <h3 class="block w-full  self-center pl-3 font-semibold">Titulo</h3>
        <h3 class="block w-[4rem]  self-center pl-3 font-semibold">Public</h3>
        <h3 class="block w-[4rem]  self-center pl-3 font-semibold">Editar</h3>
        <h3 class="block w-[4rem]  self-center pl-3 font-semibold">Excluir</h3>
    </div>
    <div class="list-padrao-clear max-h-[25rem]">
        @for ($b=0; $b < 12; $b++)
            <div class="flex border hover:border-azul-100 hover:bg-azul-400 rounded-lg mt-2">
                <h3 class="block w-[4rem] text-gray-500 hover:text-azul-100 self-center pl-3 font-semibold">{{$b}}</h3>
                <h3 class="block w-full  text-gray-500 hover:text-azul-100 self-center pl-3 font-semibold">Titulo do Artigo</h3>
                @if ($b % 2 == 1)
                    <a href="#" class="block w-[4rem] text-center text-white text-[14pt] bg-violet-500 hover:bg-violet-600 rounded-s-lg">
                        <i class="fa-solid fa-check"></i>
                    </a>
                @else
                    <a href="#" class="block w-[4rem] text-center text-white text-[14pt] bg-gray-500 hover:bg-gray-600 rounded-s-lg">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                @endif

                <button class="block w-[4rem] text-center text-white text-[14pt] bg-green-600 hover:bg-green-900"
                data-modal-target="EditArticleModal" data-modal-toggle="EditArticleModal"
                ><i class="fa-solid fa-pen-to-square"></i></button>
                <button class="block w-[4rem] text-center text-white text-[14pt] bg-red-600 hover:bg-red-900 rounded-br-lg rounded-tr-lg"
                data-modal-target="DeleteArticleModal" data-modal-toggle="DeleteArticleModal"
                ><i class="fa-regular fa-trash-can"></i></button>

            </div>
        @endfor
    </div>

</div>
<div class="block w-full mt-2">
    <nav aria-label="Page navigation example w-full">
        <ul class="flex justify-center items-center -space-x-px h-8 text-sm w-full">
            <li>
                <a href="#" class="flex items-center justify-center px-3 h-8 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only">Previous</span>
                    <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                </a>
            </li>
            @for ($t=1; $t < 13; $t++)
                <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{$t}}</a>
                </li>
            @endfor
            <li>
                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only">Next</span>
                    <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                </a>
            </li>
        </ul>
    </nav>
</div>

<!-- Modal Adicionar Calendário -->
<div id="AddCalendarModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600 bg-azul-400">
                <h3 class="text-xl font-semibold text-azul-100 dark:text-white">
                    Adicionar Calendário
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="AddCalendarModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="block p-6 space-y-6">

                <div class="flex flex-col">
                    @include('components.backoffice.label',['idname' => "title",'label' => "Titulo"])
                    <label class="relative inline-flex items-center mb-4 cursor-pointer">
                        <input id="title_default"   name="title_default" type="checkbox" value="" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Titulo Padrão "SEMED CALENDÁRIO ESCOLAR EDUCAÇÃO INFANTIL - {{ date('Y')}}"</span>
                    </label>
                    <input type="text" name="title" id="title" class="block p-2 rounded-lg w-full text-azul-100 border-azul-100 disabled:text-gray-600 disabled:bg-gray-200 disabled:border-gray-500" placeholder="Titulo do Calendário" disabled>
                </div>

                <script>
                    var titleDefault = document.getElementById('title_default');
                    var inputTitle = document.getElementById('title');
                    titleDefault.onclick = function () {
                        if (titleDefault.checked) {
                            inputTitle.disabled = true;
                            inputTitle.value = "";
                        } else {
                            inputTitle.disabled = false;
                            inputTitle.value = "";

                        }
                    }
                </script>
                <div class="flex gap-2">
                    <div class="block w-full mt-2">
                        @include('components.backoffice.label',['idname' => "date_calender",'label' => "Data Inicial"])
                        <input type="month"  name="date_calender" id="date_calender" value="{{ date('Y-m')}}" class="block p-2 rounded-lg w-full text-azul-100 border-azul-100" >
                    </div>
                    <div class="block w-full mt-2">


                        @include('components.backoffice.label',['idname' => "nivel_escolar",'label' => "Nivel Escolar"])
                        <select name="nivel_escolar" id="nivel_escolar"
                            class="w-full rounded-md border-azul-100 self-center text-azul-100"
                        >

                            @forelse ( $dados['nivelEscolar'] as $item)
                                <option value="{{$item['name'] ?? ''}}">{{$item['name'] ?? ""}}</option>
                            @empty
                                <option value="-">Não há registro!</option>
                            @endforelse

                        </select>

                        @error('nivel_escolar')
                            <div class="">{{ $message }}</div>
                        @enderror

                    </div>
                </div>




                <div class="text-azul-100 w-full text-center text-[10pt]">
                    <p>FUNDAMENTAÇÃO LEGAL: LDV nº 9.384/1996; Lei n° 4.100/2003; Resolução CME nº 10/2011</p><button type="button" id="ative_field" class="px-2 py-1 rounded-sm hover:text-green-600 hover:bg-green-100"><i class="fa-solid fa-pencil"></i></button>
                    <div id="div_lei" class="border p-2 rounded-lg" style="display:none;">
                        @include('components.backoffice.label',['idname' => "lei",'label' => "Alterar Fundamentos de Lei"])
                        <input type="text" id="lei" name="lei" value="FUNDAMENTAÇÃO LEGAL: LDV nº 9.384/1996; Lei n° 4.100/2003; Resolução CME nº 10/2011" class="block p-2 rounded-lg w-full text-green-600 border-green-600 text-[10pt]">
                    </div>
                    <script>
                        document.getElementById('ative_field').onclick = function () {
                           var lei = document.getElementById('div_lei')
                           if (lei.style.display == "none") {
                                lei.style.display = "block"
                           }else{
                                lei.style.display = "none"
                           }
                        }
                    </script>
                </div>


            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 justify-end">
                @include('components.botao.verde_a', ['title' => "Gerar", 'route' => "dashcalendaradd", 'icon' => "fa-solid fa-arrow-rotate-right pt-1 pr-2"])
                {{-- <button data-modal-hide="AddCalendarModal" type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fa-solid fa-arrow-rotate-right"></i> Gerar</button> --}}
                <button data-modal-hide="AddCalendarModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
            </div>
        </div>
    </div>
</div>
