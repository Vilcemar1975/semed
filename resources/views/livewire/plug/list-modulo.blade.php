<div>

    <div class="relative overflow-x-auto mt-3 border border-azul-100 sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-azul-100 uppercase bg-azul-400">
                <tr class="">

                    <th scope="col" class="px-3 py-2">
                        {{$heads['id']}}
                    </th>
                    @isset($heads['img'])
                        <th scope="col" class="px-3 py-2">
                            {{$heads['img']}}
                        </th>
                    @endisset
                    <th scope="col" class="px-3 py-2">
                        {{$heads['titulo']}}
                    </th>
                    <th scope="col" class="px-3 py-2 text-end">
                        {{$heads['action']}}
                    </th>

                </tr>
            </thead>
            <tbody class="h-[600px] overflow-hidden list-padrao-clear">
                @foreach ($lists as $item)
                    <tr class="bg-white border-b hover:bg-azul-400">
                        @isset($item['id'])
                            <td class="px-3 py-2">
                                {{ $item['id'] }}
                            </td>
                        @endisset
                        @isset($item['img'])
                            <td class="px-3 py-2">
                                <img src="{{asset($item['img'])}}" alt="" class="w-[80px] rounded-bl-lg rounded-tl-lg">
                            </td>
                        @endisset
                        @isset($item['title'])
                            <td class="px-3 py-2">
                                <span class="font-semibold truncate">{{ $item['title'] }}</span>
                            </td>
                        @endisset
                        @isset($item['texto'])
                            <td class="px-3 py-2">
                                <span class="truncate">{{ $item['texto'] }}</span>
                            </td>
                        @endisset
                        <td class="px-3 py-2 flex justify-end">

                            @isset($modal_public)
                                @if ($item['public'])
                                    <button class=" px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-green-500 hover:bg-green-600 rounded-s-lg"
                                    data-modal-target="{{$modal_public}}" data-modal-toggle="{{$modal_public}}"><i class="fa-solid fa-check"></i></button>
                                @else
                                    <button class=" px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-gray-500 hover:bg-gray-600 rounded-s-lg"
                                    data-modal-target="{{$modal_public}}" data-modal-toggle="{{$modal_public}}"><i class="fa-solid fa-xmark"></i></button>
                                @endif
                            @endisset

                            @if ($config)
                                <button class=" px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-orange-500 hover:bg-orange-600 rounded-s-lg"
                                data-modal-target="EditArticleModal" data-modal-toggle="EditArticleModal"><i class="fa-solid fa-screwdriver-wrench"></i></button>
                            @endif
                            @if ($view)
                                <button class=" px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-orange-500 hover:bg-orange-600 rounded-s-lg"
                                data-modal-target="EditArticleModal" data-modal-toggle="EditArticleModal"><i class="fa-solid fa-screwdriver-wrench"></i></button>
                            @endif

                            @isset($modal_edit)
                                @if (isset($route_edit))
                                    <a href="{{route($route_edit,[ id => $item['id'] ])}}" class="px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-blue-700 hover:bg-blue-900"
                                    data-modal-target="{{$modal_edit}}" data-modal-toggle="{{$modal_edit}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                @else
                                    <button class="px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-blue-700 hover:bg-blue-900"
                                    data-modal-target="{{$modal_edit}}" data-modal-toggle="{{$modal_edit}}"><i class="fa-solid fa-pen-to-square"></i></button>
                                @endif
                            @endisset

                            @isset($modal_excluir)
                                <button class=" px-1 py-2 w-[4rem] text-center text-white text-[14pt] bg-red-600 hover:bg-red-900 rounded-br-lg rounded-tr-lg"
                                data-modal-target="DeleteModal" data-modal-toggle="DeleteModal"
                                @if (isset($item['img']))
                                    onclick="excluirUnidade('{{ $item['id'] }}','{{ $item['title'] }}','{{asset($item['img'])}}')"
                                @else
                                    onclick="excluirUnidade('{{ $item['id'] }}','{{ $item['title'] }}','')"
                                @endif
                                ><i class="fa-regular fa-trash-can"></i></button>
                            @endisset
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
                    <a href="#" class="flex items-center justify-center px-3 h-8 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700">
                        <span class="sr-only">Previous</span>
                        <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                        </svg>
                    </a>
                </li>
                @for ($t=1; $t < 13; $t++)
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">{{$t}}</a>
                    </li>
                @endfor
                <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700">
                        <span class="sr-only">Next</span>
                        <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Modal Excluir Artigo -->
    <div id="DeleteModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t bg-red-200">
                    <h3 class="text-xl font-semibold text-red-900">
                        Excluir Texto e Imagem
                    </h3>
                    <button type="button" class="text-red-900 bg-transparent hover:bg-red-600 hover:text-white rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="DeleteModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Fechar Modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <div class="block text-center w-full">
                        @include('components.backoffice.label',['idname' => 'img_preview','label' => "Imagem a ser excluido"])
                        <img id="imgexcluir" src="{{asset('storage/padrao/img.jpeg')}}" alt="" id="img_preview" class="w-[15rem] mx-auto mb-3">
                    </div>
                    <hr>
                    <div class="flex gap-2 justify-between">
                        <div class="block border border-azul-100 px-3 px-1 rounded-lg">
                            @include('components.backoffice.label',['idname' => 'text','label' => "ID"])
                            <p id="excluirid"  class="text-azul-marinho"></p>
                        </div>
                        <div class="block border border-azul-100 px-3 px-1 rounded-lg w-full">
                            @include('components.backoffice.label',['idname' => 'text','label' => "Titulo"])
                            <p id="excluirtxt" class="text-azul-marinho"></p>
                        </div>
                    </div>

                </div>
                <!-- Modal footer -->
                <form action="#" method="get">
                    <input type="text" name="idexcluir" id="idexcluir" value="" class="hidden">
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b bg-red-200">
                        <button data-modal-hide="DeleteModal" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sim</button>
                        <button data-modal-hide="DeleteModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Não</button>
                    </div>
                </form>
            </div>
        </div>

    <script>
        function  excluirUnidade(idname, name, img) {
            let excluirid = document.getElementById('excluirid').textContent = idname;
            let idexcluir = document.getElementById('idexcluir').value = idname;
            let excluirtxt = document.getElementById('excluirtxt').textContent = name;
            let imgexcluir = document.getElementById('imgexcluir').src = img;
            let img_preview_label = document.getElementById('label_img_preview');
            console.log(imgexcluir);
            if (imgexcluir == "") {
                img_preview_label.textContent = "";
            }
        }
    </script>
</div>
