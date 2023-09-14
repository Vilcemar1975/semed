{{-- @include('components.backoffice.dia_calendar', [
    'nome' => 'Segundo'
    'dias' =>  $mes['calendar']['seg'],
    'cont' => count($mes['calendar']['seg']),
]) --}}
<div class="">
<h4 class="uppercase text-center text-[9pt] font-semibold my-2" >{{$nome}}</h4>
<div class="">

    <div class=" ">
        @if ($cont == 4)
            <p class="w-[4rem] p-2 border text-center m-1 rounded-md text-blue-100">00</p>
        @endif
        @if ($cont == 3)
            @for ($x=0; $x < 1; $x++)
                <p class="w-[4rem] p-2 border text-center m-1 rounded-md text-blue-100">00</p>
            @endfor
        @endif
    @foreach ($dias as $item)
        <p class="w-[4rem] p-2 border text-center m-1 rounded-md hover:bg-blue-100">{{$item}}</p>
    @endforeach
    </div>
</div>
</div>


