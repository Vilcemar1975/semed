<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Escolas') }}
        </h2>
        <div class="flex gap-2 uppercase text-[9pt] mt-2">
            <a class="text-gray-500" href="{{route('dashescola')}}">{{ __('Escolas') }} ></a><a class="text-gray-500" href="{{route('dashescolaadd')}}">{{ __('Adicionar Escolar') }}</a>
        </div>
    </x-slot>
    <x-slot name="menuleft">
        @include('components.menu.menu_dashboard',['dados' => $dados['menudashbord']])
    </x-slot>

    @include('components.backoffice.title', ['title' => "Cadastro de Escolas"])

    <div>

        <div class="mb-4 border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="escola-tab" data-tabs-target="#escola" type="button" role="tab" aria-controls="escola" aria-selected="false">Escola</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300" id="galeria-tab" data-tabs-target="#galeria" type="button" role="tab" aria-controls="galeria" aria-selected="false">Galeria</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300" id="endereco-tab" data-tabs-target="#endereco" type="button" role="tab" aria-controls="endereco" aria-selected="false">Endereço</button>
                </li>
            </ul>
        </div>
        <div id="myTabContent">
            {{-- Escola --}}
            <div class="hidden p-4 rounded-lg bg-gray-50" id="escola" role="tabpanel" aria-labelledby="escola-tab">
                <form action="{{ route('editschool', ['uid' => $escola->uid ?? null])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="block space-y-6 max-h-[600px]">
                        <div class="flex gap-2 phone:flex-wrap justify-between">
                            <div class="block text-center">
                                @include('components.backoffice.label',['idname' => 'text','label' => "Logo Marca da Escola - (Opcional)"])
                                <img src="{{asset($logo)}}" alt="" id="img_preview" class="w-[14rem] h-[9rem] mx-auto mb-3 rounded-lg">
                                <label id="imglabel" for="image" class="px-2 py-2 text-center m-auto bg-green-200 hover:bg-green-400 rounded-lg uppercase text-[9pt] font-semibold">Selecione a Logo</label>
                                <input type="file" name="image" id="image" accept="image/png, image/jpeg" class="hidden" onchange="previewImage(this)">
                            </div>
                            @include('javascript.img',[
                                    'idpreview' => 'img_preview',
                                    'idlabel' => 'imglabel',
                                ])
                            <div class="w-full">
                                <div class="flex tablet:flex-wrap gap-2 justify-between text-azul-100 py-3 px-2 mt-2 bg-azul-400 rounded-md">
                                    <div>
                                        <b>UID:</b>
                                        <span>{{ $escola->uid }}</span>
                                    </div>
                                    <div>
                                        <b>ID Grupo:</b>
                                        <span>{{ $escola->id_group }}</span>
                                    </div>
                                    <div>
                                        <b>ID Usuário Que Cadastrou:</b>
                                        <span>{{ $escola->id_user }}</span>
                                    </div>
                                </div>
                                <div class="flex target:flex-wrap justify-between  gap-2">
                                    @include('components.backoffice.fildText', ['idname' => "inep", 'label' => "INEP", 'value' => $escola->inep,'max' => 0 , 'min' => 0])
                                    @include('components.backoffice.fildDate', ['idname' => "date_open", 'label' => "Data de Abertura", 'value' => $escola->inep,'max' => 0 , 'min' => 0])
                                </div>
                                <div class="flex target:flex-wrap justify-between gap-2">
                                    @include('components.backoffice.fildselect', ['idname' => "regiao", 'label' => "Região",  'selected' => $regiao, 'lista' => $dados['regiao']])
                                    @include('components.backoffice.fildselect', ['idname' => "type", 'label' => "Localidade", 'selected' => $local ,'lista' => $localidades])
                                    @include('components.backoffice.fildselect', ['idname' => "unit", 'label' => "Unidade",  'selected' => $unidade, 'lista' => $dados['unit']])
                                </div>

                            </div>
                        </div>
                    </div>
                    <hr class="my-2">
                    <div class="flex justify-between gap-2">
                        <div class="w-full">
                            @include('components.backoffice.fildText', ['idname' => "name", 'label' => "Nome da Escola", 'value' => $escola->name,'max' => 0 , 'min' => 0])
                        </div>
                        <div class="w-full">
                            @include('components.backoffice.fildText', ['idname' => "nickname", 'label' => "Apelido - Nome da escola na comunidade (opicional) ", 'value' => $escola->nickname,'max' => 0 , 'min' => 0])
                        </div>
                    </div>

                    {{-- Pesquisa de usuário --}}
                    <div class="relative">
                        <div class="flex justify-between gap-2">
                            @include('components.backoffice.fildText', ['idname' => "diretor", 'label' => "Diretor(a)", 'value' => $direcao,'max' => 0 , 'min' => 0])
                            <input type="hidden" id="id_diretor" name="id_diretor">
                        </div>
                        <div id="searchResults" class="w-full absolute bg-white top-[75px] rounded-md shadow-md"></div>
                        @include('javascript.pesquisa_user')
                    </div>


                    <div class="flex justify-between tablet:justify-center gap-2">
                        <div class="flex">
                            @include('components.backoffice.fildText', ['idname' => "telephone", 'type' => "tel", 'label' => "Telefone", 'value' => $escola->phones[0]['number'],'max' => 0 , 'min' => 0])
                            <div class="flex flex-col">
                                <div class="h-[25px]"></div>
                                @include('components.backoffice.fildcheck_peq', ['idname' => "telephone_whatsapp", 'label' => "whatsapp", 'value' => 1, 'checked' => $escola->phones[0]['icon'][0]['active']])
                                @include('components.backoffice.fildcheck_peq', ['idname' => "telephone_telegran", 'label' => "telegran", 'value' => 7, 'checked' => $escola->phones[0]['icon'][1]['active']])
                            </div>
                        </div>
                        <div class="flex">
                            @include('components.backoffice.fildText', ['idname' => "phone", 'type' => "tel", 'label' => "Celular", 'value' => $escola->phones[1]['number'],'max' => 0 , 'min' => 0])
                            <div class="flex flex-col">
                                <div class="h-[25px]"></div>
                                @include('components.backoffice.fildcheck_peq', ['idname' => "phone_whatsapp", 'label' => "whatsapp", 'value' => 1, 'checked' => $escola->phones[1]['icon'][0]['active']])
                                @include('components.backoffice.fildcheck_peq', ['idname' => "phone_telegran", 'label' => "telegran", 'value' => 7, 'checked' => $escola->phones[1]['icon'][1]['active']])
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between gap-2">
                        @include('components.backoffice.fildText', ['idname' => "email_google", 'type' => "email", 'label' => "Educacao - Google", 'value' => $escola->emails[0]['email'],'max' => 0 , 'min' => 0])
                        @include('components.backoffice.fildText', ['idname' => "email_microsoft", 'type' => "email", 'label' => "Edu - Microsoft", 'value' => $escola->emails[1]['email'],'max' => 0 , 'min' => 0])
                    </div>

                    {{-- Estrutura --}}
                    <div class="relative mb-3">
                        <div class="flex gap-2 justify-between">
                            @include('components.backoffice.fildselect', ['idname' => "estrutura", 'label' => "Estrutura da Escola", 'selected' => ['id' => 0, 'title' => ""] , 'lista' => $dados['structurelist']])
                            {{-- <button type="button" class="relative top-[30px] w-[48px] h-[44px] text-[18pt] text-white text-center bg-azul-100 hover:bg-azul-500 rounded-md"><i class="fa-solid fa-angles-down"></i></button> --}}
                        </div>
                        <div id="list_inputs" class="flex gap-2 flex-wrap justify-start"></div>
                    </div>
                    @include('javascript.struture')
                    <hr>

                    {{-- Rede Social --}}
                    <div class="pt-2">
                        @include('components.backoffice.label',['idname' => '','label' => "Rede Social"])

                        <div class="flex flex-wrap justify-between gap-2 py-3">
                            @if ($escola->social_media == null)
                                @for ($x = 1 ; $x < count($dados['icons'])-1; $x++ )
                                    <div class="flex flex-col justify-items-center">
                                        <label for="" class="text-[12pt] text-azul-100"><i class="{{$dados['icons'][$x]['icon']}}"></i> {{ $dados['icons'][$x]['name']}}</label>
                                        <input id="netSocial_{{ $dados['icons'][$x]['name'] }}" name="netSocial_{{ $dados['icons'][$x]['name'] }}" type="text" class="w-full p-2 rounded-lg border-azul-100" >
                                    </div>
                                @endfor
                            @else
                                @for ($x = 0 ; $x < count($escola->social_media); $x++ )
                                    <div class="flex flex-col justify-items-center">
                                        <label for="" class="text-[12pt] text-azul-100"><i class="{{$escola->social_media[$x]['icon']}}"></i> {{ $escola->social_media[$x]['name']}}</label>
                                        <input id="netSocial_{{ $escola->social_media[$x]['name'] }}" name="netSocial_{{ $escola->social_media[$x]['name'] }}" type="text" value="{{ $escola->social_media[$x]['url'] }}" class="w-full p-2 rounded-lg  border-azul-100" >
                                    </div>
                                @endfor
                            @endif

                        </div>
                    </div>
                    <hr>
                    <div class="block">
                        @include('components.backoffice.label',['idname' => 'text','label' => "Observação"])
                        <textarea name="text" id="text" placeholder="Digite aqui seu texto" class="block w-full border border-azul-100 rounded-lg text-[10pt]">{{$escola->description}}</textarea>
                    </div>




                    <br><hr>
                    <div class="flex gap-2">
                        @include('components.backoffice.status', [
                            'public' => $status['public'] == 'public' ? true: false,
                            'public_day' => $status['public'] == 'public_day' ? true: false,
                            'date_start' => $status['date_start'],
                            'date_end' => $status['date_end'],
                            'hour_start' => $status['hour_start'],
                            'hour_end' => $status['hour_end'],
                            'no_public' => $status['public'] == 'no_public' ? true: false,
                        ])

                        @include('components.backoffice.configuracoes', [
                            'show_author' => $configs['show_author'],
                            'show_day_public' => $configs['show_day_public'],
                            'show_description' => $configs['show_description'],
                            'show_url' => $configs['show_url'],
                            'show_download' => $configs['show_download'],
                            'show_day_alteration' =>$configs['show_day_alteration'],
                            'show_author_photo' => $configs['show_author_photo'],
                            'show_share' => $configs['show_share'],
                            'show_print' => $configs['show_print'],
                        ])

                    </div>
                    <div class="flex gap-2 justify-between">
                        @include('components.backoffice.fildcheck', ['idname' => "detach", 'label' => "Destacar", 'checked' => $escola->highlight])
                        @include('components.backoffice.fildselect', ['idname' => "position_spasion", 'label' => "Posição Especial", 'lista' => $dados['position_spacial'], 'selected' => $position_esp])
                        @include('components.backoffice.fildselect', ['idname' => "acess", 'label' => "Acesso", 'lista' => $dados['acess'], 'selected' => $acess ])
                    </div>
                    <br>
                    <div class="flex flex-wrap gap-2 justify-end">
                        @include('components.botao.cinza_a', ["title" => "Voltar", 'route' => "dashescola"])
                        @include('components.botao.verde', ["title" => "Salvar", 'type' => "submit"])
                    </div>
                </form>
            </div>
            {{-- Galeria --}}
            <div class="hidden p-4 rounded-lg bg-gray-50" id="galeria" role="tabpanel" aria-labelledby="galeria-tab">
                <div class="flex gap-3 flex-col">
                    <form action="{{ route('gallerystore', ['uid' => $escola->uid ?? null])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mx-auto my-2 text-center mb-3">
                            <label for="photos" class="px-3 py-2 bg-azul-100 hover:bg-azul-500  text-white uppercase rounded-lg ">Selecione as Imagens</label>
                            <input id="photos" name="photos[]" type="file" value="" class="hidden" multiple accept="image/png, image/jpeg">
                        </div>
                        <div id="list_gallery" class="flex flex-wrap justify-between gap-2">
                            {{-- <figure class="max-w-lg mx-auto">
                                <img class="h-auto max-w-full rounded-lg mx-auto" src="{{ asset('storage/padrao/img.jpeg')}}" alt="image description">
                                <input id="galery" name="galery" type="text" class="p-2 rounded-lg w-full border-azul-100 mt-3" placeholder="Local de qual foi tirado a foto.">
                            </figure> --}}
                        </div>
                        <div class="mt-8 text-end">
                            <button id="saveButton" type="submit" class="py-2 px-3 text-white bg-green-600 hover:bg-green-900 rounded-md"><i class="fa-regular fa-floppy-disk"></i> Salvar</button>
                        </div>
                    </form>
                    <hr>
                    @include('components.backoffice.label',['idname' => 'text','label' => "Galeria de Fotos"])

                </div>
                @include('javascript.gallery')
                <div class="flex flex-wrap justify-between gap-3">
                    @forelse ( $galleries->imagens as $gallery)

                        <div class="relative w-[18rem] rounded-md bg-white">
                            <img src="{{asset($gallery['url'])}}" alt="" title="Imagem {{$loop->index+1}}" class="h-full rounded-md">
                            <button class="absolute bottom-3 w-[36px] h-[36px] right-2 text-white text-[16pt] bg-azul-100 hover:bg-azul-500 rounded-md"><i class="fa-solid fa-align-justify"></i></button>
                        </div>

                    @empty
                        <p>Nenhuma Foto foi postada.</p>
                    @endforelse
                </div>
            </div>
            {{-- Endereço --}}
            <div class="hidden p-4 rounded-lg bg-gray-50" id="endereco" role="tabpanel" aria-labelledby="endereco-tab">
                <form action="{{route('andresssalvar',['uid' => $escola->uid])}}" method="get">
                    @csrf
                    <div class="flex gap-2 justify-center mb-3">
                        <div class="w-[30%]">
                            @include('components.backoffice.fildText', ['idname' => "cep", 'label' => "CEP", 'value'=> $andress->cep ?? "", 'max' => 11 , 'min' => 0])
                        </div>
                        @include('components.backoffice.fildText', ['idname' => "street", 'label' => "Logradouro", 'value'=> $andress->street ?? "", 'max' => 0 , 'min' => 0])
                    </div>
                    <div class="flex gap-2 justify-center mb-3">
                        <div class="w-[30%]">
                            @include('components.backoffice.fildText', ['idname' => "number", 'label' => "numero", 'value'=> $andress->number ?? "", 'max' => 0 , 'min' => 0, 'type' => "number"])
                        </div>
                        @include('components.backoffice.fildText', ['idname' => "complement", 'label' => "Complemento", 'value'=> $andress->complement ?? "", 'max' => 0 , 'min' => 0])
                    </div>
                    <div class="flex gap-2 justify-center mb-3">
                        @include('components.backoffice.fildText', ['idname' => "district", 'label' => "Bairro", 'value'=> $andress->district ?? "", 'max' => 0 , 'min' => 0])
                        @include('components.backoffice.fildText', ['idname' => "city", 'label' => "Cidade", 'value'=> $andress->city ?? "", 'max' => 0 , 'min' => 0])
                    </div>
                    <div class="flex gap-2 justify-center mb-3">
                        @include('components.backoffice.fildText', ['idname' => "state", 'label' => "UF", 'value'=> $andress->state ?? "", 'max' => 2 , 'min' => 0])
                        @include('components.backoffice.fildText', ['idname' => "country", 'label' => "Pais", 'value'=> $andress->country ?? "", 'max' => 0 , 'min' => 0, 'value' => "Brasil"])
                        @include('components.backoffice.fildcheck_peq', ['idname' => "permission", 'label' => "Permitir Visualisar", 'checked' => $andress->status ?? ""])
                    </div>

                    {{-- <input type="hidden" id="uidAndress" name="uidAndress" value="{{ $andress->uid ?? null }}"> --}}
                    <input type="hidden" id="ibge" name="ibge" value="{{ $andress->ibge ?? null }}">
                    <input type="hidden" id="gia" name="gia" value="{{ $andress->gia ?? null }}">
                    <input type="hidden" id="ddd" name="ddd" value="{{ $andress->ddd ?? null }}">
                    <input type="hidden" id="siafi" name="siafi" value="{{ $andress->siafi ?? null }}">

                    <div class="mt-8 text-end">
                        <button type="submit" class="py-2 px-3 text-white bg-green-600 hover:bg-green-900 rounded-md"><i class="fa-regular fa-floppy-disk"></i> Salvar</button>
                    </div>
                </form>
            </div>
            @include('javascript.cep')
        </div>
    </div>

</x-app-layout>
