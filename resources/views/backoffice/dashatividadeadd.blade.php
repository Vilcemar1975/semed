<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Atividades') }}
        </h2>
        <div class="flex gap-2 uppercase text-[9pt] mt-2">
            <a class="text-gray-500" href="{{route('dashatividade')}}">{{ __('Atividades') }} ></a>
            <a class="text-gray-500" href="{{route('dashatividadeadd')}}">{{ __('Adicionar Provas') }}</a>
        </div>
    </x-slot>
    <x-slot name="menuleft">
        @include('components.menu.menu_dashboard',['dados' => $dados['menudashbord']])
    </x-slot>

    @include('components.backoffice.title', ['title' => "Adicionar Provas"])

    @livewire('atividades-edit')

</x-app-layout>
