<div class="flex gap-1 mt-2" class="flex">
    @include('components.botao.verde_a',['title' => "Livro", 'route' => "dashartigoadd", 'icon' => "fa-solid fa-plus text-[12pt] pt-1 pr-2"])
    <div class="flex flex-nowrap w-full">
        <input type="search" name="pesquisa" id="pesquisa"
        class="w-full text-azul-100 py-2 px-3 border border-azul-100 rounded-s-md"
        placeholder="Pesquisar"
        >
        <button type="button" class="block relative w-[48px]  bg-azul-100 hover:bg-azul-500 border border-azul-100 rounded-e-md">
            <i class="fa-solid fa-magnifying-glass text-white"></i>
        </button>

    </div>
    <button type="button" id="button_filtro" onclick="filtro()" class="block hover:bg-azul-400 bg-azul hover:text-azul-100 text-white uppercase text-[12pt] px-3 py-2 rounded-md">Filtrar</button>
</div>
@include('components.backoffice.filter')

<div class="block w-full  border border-azul-100 mt-2 p-3 rounded-lg overflow-hidden">
    <div class="flex bg-azul-400 rounded-md mt-2 text-azul-100 justify-between">
        <h3 class="block basis-1/12 self-center pl-3 font-semibold">ID</h3>
        <h3 class="block basis-1/2 self-center pl-3 font-semibold">Titulo</h3>
        <h3 class="block basis-1/2 self-center  font-semibold">Categoria</h3>
        <div class=" flex gap-3 block basis-1/3 justify-start">
            <h3 class="block basis-1/1  self-center pl-3 font-semibold">Public</h3>
            <h3 class="block basis-1/1  self-center pl-3 font-semibold">Editar</h3>
            <h3 class="block basis-1/1 self-center pl-3 font-semibold">Excluir</h3>
        </div>
    </div>
    <div class="list-padrao-clear max-h-[25rem]">
        @for ($b=0; $b < 12; $b++)
            <div class="flex justify-between border hover:border-azul-100 hover:bg-azul-400 rounded-lg mt-2">
                <h3 class="block basis-1/10 text-gray-500 hover:text-azul-100 self-center pl-3 font-semibold">{{$b}}</h3>
                <h3 class="block basis-1/3 text-gray-500 hover:text-azul-100 self-center pl-3 font-semibold">Titulo do Livro</h3>
                <h3 class="block basis-1/3  text-gray-500 hover:text-azul-100 self-center  font-semibold">Categoria</h3>
                <div class=" flex block basis-1/4">
                    @if ($b % 2 == 1)
                    <a href="#" class="block w-full text-center text-white text-[14pt] bg-violet-500 hover:bg-violet-600 rounded-s-lg">
                        <i class="fa-solid fa-check"></i>
                    </a>
                @else
                    <a href="#" class="block  w-full text-center text-white text-[14pt] bg-gray-500 hover:bg-gray-600 rounded-s-lg">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                @endif

                <button class="block  w-full text-center text-white text-[14pt] bg-green-600 hover:bg-green-900"
                    data-modal-target="EditArticleModal" data-modal-toggle="EditArticleModal"
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
