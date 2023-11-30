<div>
    <div class="relative overflow-x-auto mt-3 border border-azul-100 sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-azul-100 uppercase bg-azul-400 dark:bg-gray-700 dark:text-gray-400">
                <tr class="">
                    @foreach ($heads as $head)
                        @if ($loop->last)
                            <th scope="col" class="px-3 py-2 text-end">
                        @else
                            <th scope="col" class="px-3 py-2">
                        @endif
                            {{$head}}
                        </th>

                    @endforeach

                </tr>
            </thead>
            <tbody class="h-[600px] overflow-hidden list-padrao-clear">
                @foreach ($lists as $list)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-azul-400 dark:hover:bg-gray-600">

                        @foreach ($list as $item)
                            @dd()
                            <td class="px-3 py-2">
                                {{ $item }}
                            </td>

                        @endforeach

                        <td class="px-3 py-2 flex justify-end">
                            @if ($public)
                                @foreach ( $public as $pub)
                                    @if ($pub == "public")
                                        <button class=" px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-green-500 hover:bg-green-600 rounded-s-lg"
                                        data-modal-target="EditArticleModal" data-modal-toggle="EditArticleModal"><i class="fa-solid fa-check"></i></button>
                                    @else
                                        <button class=" px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-gray-500 hover:bg-gray-600 rounded-s-lg"
                                        data-modal-target="EditArticleModal" data-modal-toggle="EditArticleModal"><i class="fa-solid fa-xmark"></i></button>
                                    @endif
                                @endforeach
                            @endif
                            @if ($config)
                                <button class=" px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-orange-500 hover:bg-orange-600 rounded-s-lg"
                                data-modal-target="EditArticleModal" data-modal-toggle="EditArticleModal"><i class="fa-solid fa-screwdriver-wrench"></i></button>
                            @endif
                            @if ($view)
                                <button class=" px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-orange-500 hover:bg-orange-600 rounded-s-lg"
                                data-modal-target="EditArticleModal" data-modal-toggle="EditArticleModal"><i class="fa-solid fa-screwdriver-wrench"></i></button>
                            @endif

                            <button class=" px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-blue-700 hover:bg-blue-900"
                            data-modal-target="ModalEditGrupo" data-modal-toggle="ModalEditGrupo"
                            ><i class="fa-solid fa-pen-to-square"></i></button>
                            <button class=" px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-red-600 hover:bg-red-900 rounded-br-lg rounded-tr-lg"
                            data-modal-target="ModalExcluirGrupo" data-modal-toggle="ModalExcluirGrupo"
                            ><i class="fa-regular fa-trash-can"></i></button>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
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
</div>
