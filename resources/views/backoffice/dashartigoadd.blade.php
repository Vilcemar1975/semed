<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Artigos') }}
        </h2>
        <div class="flex gap-2 uppercase text-[9pt] mt-2">
            <a class="text-gray-500" href="{{route('dashartigo')}}">{{ __('Artigos') }} ></a>
            <a class="text-gray-500" href="{{route('dashartigoadd')}}">{{ __('Adicionar Artigos') }}</a>
        </div>
    </x-slot>
    <x-slot name="menuleft">
        @include('components.menu.menu_dashboard',['dados' => $dados['menudashbord']])
    </x-slot>

    @include('components.backoffice.title', ['title' => "Adicionar Artigos"])

    @livewire('artido-edit')

</x-app-layout>
