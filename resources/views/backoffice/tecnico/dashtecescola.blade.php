<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Escolas') }}
        </h2>
        <div class="flex gap-2 uppercase text-[9pt] mt-2">
            <a class="text-gray-500" href="{{route('dashboard')}}">{{ __('Escola') }}</a>
        </div>
    </x-slot>
    <x-slot name="menuleft">
        @include('components.menu.menu_dashboard',['dados' => $dados['menuTecnico']])
    </x-slot>

    @include('components.backoffice.title', ['title' => "Sobre Escolas "])

    <div>
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent text-azul-100 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="device-tab" data-tabs-target="#device" type="button" role="tab" aria-controls="device" aria-selected="false">Dispositivos</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent text-azul-100 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="netmap-tab" data-tabs-target="#netmap" type="button" role="tab" aria-controls="netmap" aria-selected="false">Mapa da Rede</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent text-azul-100 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Impressora</button>
                </li>
                <li role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent text-azul-100 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">Técnicos</button>
                </li>
            </ul>
        </div>
        <div id="myTabContent">
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="device" role="tabpanel" aria-labelledby="device-tab">
                @include('components.backoffice.tecnicos.computadores')
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="netmap" role="tabpanel" aria-labelledby="netmap-tab">
                Redes
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">

            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">

            </div>
        </div>
    </div>


</x-app-layout>
