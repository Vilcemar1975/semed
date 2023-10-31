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

        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="escola-tab" data-tabs-target="#escola" type="button" role="tab" aria-controls="escola" aria-selected="false">Escola</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="foto-tab" data-tabs-target="#foto" type="button" role="tab" aria-controls="foto" aria-selected="false">Foto</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="endereco-tab" data-tabs-target="#endereco" type="button" role="tab" aria-controls="endereco" aria-selected="false">Endereço</button>
                </li>
            </ul>
        </div>
        <div id="myTabContent">
            {{-- Escola --}}
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="escola" role="tabpanel" aria-labelledby="escola-tab">
                <div class="flex justify-between gap-2">
                    <div class="">
                        @include('components.backoffice.fildselect', ['idname' => "regiao", 'label' => "Região", 'lista' => []])
                    </div>
                    <div class="w-full">
                        @include('components.backoffice.fildText', ['idname' => "name", 'label' => "Nome da Escola", 'max' => 0 , 'min' => 0])
                    </div>
                </div>
                <div class="flex justify-between gap-2">
                    <div class="w-full">
                        @include('components.backoffice.fildText', ['idname' => "diretor", 'label' => "Diretor(a)", 'max' => 0 , 'min' => 0])
                    </div>
                    <div class="">
                        @include('components.backoffice.fildText', ['idname' => "phone", 'label' => "Telefone", 'max' => 0 , 'min' => 0])
                    </div>
                </div>
                <div class="flex justify-between gap-2">
                    <div class="w-full">
                        @include('components.backoffice.fildText', ['idname' => "email1", 'label' => "E-mail I", 'max' => 0 , 'min' => 0])
                    </div>
                    <div class="w-full">
                        @include('components.backoffice.fildText', ['idname' => "email2", 'label' => "E-mail II", 'max' => 0 , 'min' => 0])
                    </div>
                </div>
                <div class="block">
                    @include('components.backoffice.label',['idname' => 'text','label' => "Observação"])
                    <textarea name="text" id="text" placeholder="Digite aqui seu texto" class="block w-full border border-azul-100 rounded-lg text-[10pt]"></textarea>
                </div>

                <br><hr>
        <div class="flex gap-2 p-4 ">
            <div class="block  mt-3 w-full">
                @include('components.backoffice.label',['idname' => 'status','label' => "Status"])
                <div class="block border p-3  rounded-lg border border-azul ">
                    @include('components.backoffice.fildratius', ['idid' => "public", 'idname' => "public", 'label' => "Publicar", 'checkted' => false ])
                    <div id="public_date_time" class="flex gap-2">
                        @include('components.backoffice.fildratius', ['idid' => "public_day", 'idname' => "public", 'label' => "Publicar no dia ", 'checkted' => false ])
                        <input type="date" name="public_date" id="public_date" class="rounded-lg border border-azul-100 text-azul-100 text-[10pt]">
                        <p class="mt-3 text-azul-100 font-semibold uppercase text-[9pt]"> as </p>
                        <input type="time" name="public_time" id="public_time" class="rounded-lg border border-azul-100 text-azul-100 text-[10pt]">
                    </div>
                    @include('components.backoffice.fildratius', ['idid' => "no_public", 'idname' => "public", 'label' => "Não Publicar", 'checkted' => true ])
                </div>
            </div>
            <div class="block  mt-3 w-full">
                @include('components.backoffice.label',['idname' => 'config','label' => "Configuração"])
                <div class="flex justify-between border border-azul p-3  rounded-lg">
                    <div class="">
                        @include('components.backoffice.fildcheck_peq', ['idname' => "show_author", 'label' => "Mostra Autor"])
                        @include('components.backoffice.fildcheck_peq', ['idname' => "show_date_public", 'label' => "Mostra Data de Publicação"])
                        @include('components.backoffice.fildcheck_peq', ['idname' => "show_object", 'label' => "Mostra Assunto"])
                        @include('components.backoffice.fildcheck_peq', ['idname' => "show_url", 'label' => "Mostra Url"])
                    </div>
                    <div class="">
                        @include('components.backoffice.fildcheck_peq', ['idname' => "show_download", 'label' => "Mostra Botão de Download"])
                        @include('components.backoffice.fildcheck_peq', ['idname' => "show_date_alter", 'label' => "Mostra Data de Alteração"])
                        @include('components.backoffice.fildcheck_peq', ['idname' => "show_author_photo", 'label' => "Mostra Autor Fotografia"])
                        @include('components.backoffice.fildcheck_peq', ['idname' => "show_shared", 'label' => "Mostra Compartilhamento"])
                    </div>
                </div>
            </div>
        </div>
        <div class="flex gap-2 justify-between">
            @include('components.backoffice.fildcheck', ['idname' => "detach", 'label' => "Destacar"])
            @include('components.backoffice.fildselect', ['idname' => "position_spasion", 'label' => "Posição Especial", 'lista' => []])
            @include('components.backoffice.fildselect', ['idname' => "acess", 'label' => "Acesso", 'lista' => []])
        </div>
        <br>
        <div class="flex flex-wrap gap-2 justify-end">
            @include('components.botao.cinza_a', ["title" => "Cancelar", 'route' => "dashartigo"])
            @include('components.botao.verde', ["title" => "Salvar", 'type' => "submit"])
        </div>
            </div>
            {{-- Foto --}}
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="foto" role="tabpanel" aria-labelledby="foto-tab">
                <div class="flex gap-3 flex-col">
                    <div>
                        <figure class="max-w-lg mx-auto">
                            <img class="h-auto max-w-full rounded-lg mx-auto" src="{{ asset('storage/padrao/img.jpeg')}}" alt="image description">
                            <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">Image caption</figcaption>
                        </figure>
                    </div>
                    <div class="mx-auto my-2">
                        <label for="photos" class="px-3 py-2 bg-green-600 hover:bg-green-800  text-white uppercase rounded-lg "><i class="fa-solid fa-plus"></i> Imagem</label>
                        <input id="photos" name="photos" type="file" value="" class="hidden" multiple accept="image/png, image/jpeg">
                    </div>
                    <div class="flex justify-between gap-2">
                        <figure class="max-w-lg mx-auto">
                            <img class="h-auto max-w-full rounded-lg mx-auto" src="{{ asset('storage/padrao/img.jpeg')}}" alt="image description">
                            <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">Image caption</figcaption>
                        </figure>
                        <figure class="max-w-lg mx-auto">
                            <img class="h-auto max-w-full rounded-lg mx-auto" src="{{ asset('storage/padrao/img.jpeg')}}" alt="image description">
                            <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">Image caption</figcaption>
                        </figure>
                        <figure class="max-w-lg mx-auto">
                            <img class="h-auto max-w-full rounded-lg mx-auto" src="{{ asset('storage/padrao/img.jpeg')}}" alt="image description">
                            <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">Image caption</figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            {{-- Endereço --}}
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="endereco" role="tabpanel" aria-labelledby="endereco-tab">

                <div class="flex gap-2 justify-center mb-3">
                    <div class="w-[30%]">
                        @include('components.backoffice.fildText', ['idname' => "cep", 'label' => "CEP", 'max' => 11 , 'min' => 0])
                    </div>
                    @include('components.backoffice.fildText', ['idname' => "logradouro", 'label' => "Logradouro", 'max' => 0 , 'min' => 0])
                </div>
                <div class="flex gap-2 justify-center mb-3">
                    <div class="w-[30%]">
                        @include('components.backoffice.fildText', ['idname' => "numero", 'label' => "numero", 'max' => 0 , 'min' => 0, 'type' => "number"])
                    </div>
                    @include('components.backoffice.fildText', ['idname' => "complemento", 'label' => "Complemento", 'max' => 0 , 'min' => 0])
                </div>
                <div class="flex gap-2 justify-center mb-3">
                    @include('components.backoffice.fildText', ['idname' => "cidade", 'label' => "Bairro", 'max' => 0 , 'min' => 0])
                    @include('components.backoffice.fildText', ['idname' => "cidade", 'label' => "Cidade", 'max' => 0 , 'min' => 0])
                </div>
                <div class="flex gap-2 justify-center mb-3">
                    @include('components.backoffice.fildText', ['idname' => "uf", 'label' => "UF", 'max' => 2 , 'min' => 0])
                    @include('components.backoffice.fildText', ['idname' => "uf", 'label' => "Pais", 'max' => 0 , 'min' => 0, 'value' => "Brasil"])
                    <div class="w-full"></div>
                </div>
                <div class="mt-8 text-end">
                    <button type="button" class="py-2 px-3 text-white bg-green-600 hover:bg-green-900 rounded-md"><i class="fa-regular fa-floppy-disk"></i></button>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
