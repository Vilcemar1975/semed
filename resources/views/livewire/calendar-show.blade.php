
<div class="w-full bg-blue-100 rounded-md text-center font-semibold text-[16pt] text-azul-100">
    ANO 2023
</div>
<div class="mb-4 border-b border-gray-200 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center " id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
        @foreach($menuCalendar as $itemenu)
            <li class="mr-2" role="presentation">
                <button  class="inline-block p-4 border-b-2 rounded-t-lg uppercase text-azul-100" id="{{$itemenu['nick']}}-tab" data-tabs-target="#{{$itemenu['nick']}}" type="button" role="tab" aria-controls="{{$itemenu['nick']}}" aria-selected="false"  >{{$itemenu['mes']}}</button>
            </li>
        @endforeach
    </ul>
</div>
<div id="myTabContent">
    @foreach($menuCalendar as $mes)
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="{{ $mes['nick'] }}" role="tabpanel" aria-labelledby="{{$mes['nick']}}-tab">
            <h3 class="w-full text-center text-[14pt] capitalize">{{$mes['calendar']['nome']}}</h3>
            <hr class="mb-2">
            <div class="flex justify-between">

                @include('components.backoffice.dia_calendar', [
                    'nome' => 'Domingo',
                    'dias' =>  $mes['calendar']['dom'],
                    'cont' => count($mes['calendar']['dom']),
                ])

                @include('components.backoffice.dia_calendar', [
                        'nome' => 'Segundo',
                        'dias' =>  $mes['calendar']['seg'],
                        'cont' => count($mes['calendar']['seg']),
                    ])

                @include('components.backoffice.dia_calendar', [
                    'nome' => 'Terça',
                    'dias' =>  $mes['calendar']['ter'],
                    'cont' => count($mes['calendar']['ter']),
                ])


                @include('components.backoffice.dia_calendar', [
                    'nome' => 'Quarta',
                    'dias' =>  $mes['calendar']['qua'],
                    'cont' => count($mes['calendar']['qua']),
                ])

                @include('components.backoffice.dia_calendar', [
                    'nome' => 'Quinta',
                    'dias' =>  $mes['calendar']['qui'],
                    'cont' => count($mes['calendar']['qui']),
                ])

                @include('components.backoffice.dia_calendar', [
                    'nome' => 'Sexta',
                    'dias' =>  $mes['calendar']['sex'],
                    'cont' => count($mes['calendar']['sex']),
                ])

                @include('components.backoffice.dia_calendar', [
                    'nome' => 'Sabádo',
                    'dias' =>  $mes['calendar']['sab'],
                    'cont' => count($mes['calendar']['sab']),
                ])

            </div>
        </div>
    @endforeach

</div>
