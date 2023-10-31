{{-- @include('components.backoffice.calendar.calendario' , ['menuCalendar' => $menuCalendar]) --}}
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
            <h3 class="w-full text-center text-azul-100 text-[14pt] capitalize">{{ date('Y-m', $mes['calendar']) }}</h3>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        @foreach ($diasemana as $diasem )
                            <th scope="col" class="px-6 py-3 text-center text-azul-100">
                                {{$diasem}}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody id="table_body">
                    @php
                        $startDate = strtotime("last sunday", $mes['calendar']);
                    @endphp
                    @for ($linha=0; $linha < 6; $linha++ )
                        <tr  id="row_{{date('m_y', $startDate)}}" class="relative bg-white border-b dark:bg-gray-900 dark:border-gray-700 div_row">
                            @for ($col=0; $col < 7; $col++ )

                                @if (date('Y-m', $startDate) !== date('Y-m', $mes['calendar']))
                                    <td id="data_inativa" nome="data_inativa" class="relative text-center text-gray-300">
                                        <p class="px-6 py-4">
                                @else
                                    <td id="data_ativa_{{date('j_m_y', $startDate)}}" nome="data_ativa{{date('j_m_y', $startDate)}}"  class="relative  text-center text-azul-100 hover:bg-blue-100">
                                        <p id="text_{{date('j_m_y', $startDate)}}" onclick="tranca('{{date('j_m_y', $startDate)}}')" class="px-6 py-4">
                                @endif
                                            @php
                                                echo date('j', $startDate);
                                            @endphp

                                        </p>
                                        <input id="date_full" name="date_full" type="hidden" class="hidden" value="{{$startDate}}">

                                </td>


                                @php
                                    $startDate = strtotime("+1 day", $startDate);
                                @endphp

                            @endfor
                        </tr>
                    @endfor
                </tbody>
            </table>

            {{-- <div class="flex mt-3 justify-end">
                @include('components.botao.bt_modal', ['title' => "Legenda", 'txtcor' => "white", 'bg' => "green", 'modal' => "AddArticleModal", 'icon' => "fa-regular fa-plus text-[16pt] pr-2"])
            </div> --}}
            <div id="divedit" class="block uppercase relative text-azul-100 bg-azul-400  p-2 rounded-b-lg">
                <form action="#" method="get">
                    <h3 class="font-semibold">Eventos</h3>
                    <div class="flex flex-nowrap gap-2 justify-center">
                        <input id="inputdias" name="inputdias" type="hidden" value="">
                        <div id="divdias" class="flex gap-2 justify-start"></div>
                        <input id="date_actual_day" type="hidden" name="date_actual_day"  value="">
                        <input id="date_last_day" type="date" name="date_last_day"  value="" class="my-2 mx-auto w-[10rem] boder  h-8 rounded-md disabled:text-gray-400 disabled:border-gray-400" disabled>
                        <input id="legenda_day" type="text" name="Legenta_day"  value="" class="my-2 w-full boder  border-azul-100 text-azul h-8  rounded-md disabled:text-gray-400 disabled:border-gray-400" placeholder="Legenda" disabled>
                        <div class="flex justify-between">
                            <label for="legenta_daycor" class="my-1 font-semibold">Cor: </label>
                            <input id="legenta_daycor" type="color" name="legenta_daycor"  value="" onchange="pinckcolor('this.value')" class="my-1 h-8 border-1 rounded-lg" disabled><br>
                            <div class="w-8 h-6 my-2" style="background-color: #fff"></div>
                        </div>
                    </div>

                    <div class="flex justify-center gap-5">
                        <button type="submit" class="my-1 py-1 w-10 rounded-md text-center bg-green-600 hover:bg-green-800 text-white"><i class="fa-regular fa-floppy-disk"></i></button>
                        <button type="button" onclick="limpezaCampo()" class="my-1 py-1 w-10 rounded-md text-center bg-azul-100 hover:bg-azul-500 text-white"><i class="fa-solid fa-broom"></i></button>
                    </div>

                </form>
                <form action="#" method="get">
                    <div class="flex justify-end gap-5">
                        <button type="button" onclick="limpezaCampo()" class="py-1 my-2 w-[2rem] rounded-md text-center bg-azul-400 hover:bg-gray-200 text-gray-600"><i class="fa-regular fa-trash-can"></i></button>
                    </div>
                </form>
            </div>
            <p class="w-full font-semibold text-[10pt] text-gray-500 text-center ">Para adicionar um evento só clicar nos numeros.</p>
        </div>
    @endforeach

        <script>
            const DIAS = [];
            const PTXT = [];

           function tranca(id) {
                var inputdias = document.getElementById('inputdias');
                var divdias = document.getElementById('divdias');

                var ate = document.getElementById('ate');
                var datefull = document.getElementById('date_full');
                var date = document.getElementById('date_actual_day');
                var datelast = document.getElementById('date_last_day');
                var legenda = document.getElementById('legenda_day');
                var cor = document.getElementById('legenta_daycor');
                var p = document.getElementById('text_'+id);


                if (date.disabled == false) {
                    date.disabled = false;
                    datelast.disabled = false;
                    legenda.disabled = false;
                    cor.disabled = false;
                    p.style.backgroundColor = "#ccc";
                }
                //var txtp = p.innerHTML;
                //DIAS.push(datefull.value);

                //var txt = ate.innerHTML;
                //divDias(id);


           }

           //<h3 id="ate" class="my-2 font-semibold">Até</h3>
           function divDias(id) {
                var diastxt = "";
                var divdias2 = document.getElementById('divdias');
                console.log(id);

                for (let f = 0; f < DIAS.length; f++) {

                    diastxt = new Date(,,DIAS[f],,,,,);
                    console.log(diastxt);
                    var text = document.createTextNode(diastxt);
                    var h3 = document.createElement('h3');
                    h3.className = "my-2 font-semibold";
                    h3.setAttribute('id', "dias_"+f);
                    h3.appendChild(text);

                    divdias.appendChild(h3);
                }

                inputdias.value = diastxt;

                console.log(divdias);
                return diastxt;
           }


           function closeAll(id) {
                var body = document.getElementById('table_body');
                var todos = body.querySelectorAll('tr');

                for (let i = 0; i < todos.length; i++) {
                    var row = todos[i].querySelectorAll('div');
                    for (let c = 0; c < row.length; c++) {
                        const td = row[c];
                        if (td.id != id) {
                            td.style.display = "none";
                        }

                    }

                }
           }

           function limpezaCampo(id) {
                document.getElementById('date_'+id).value = "";
                document.getElementById('text_'+id).value = "";
                document.getElementById('cor_'+id).value = "";
                inputdias.value = "";


                while (divdias.firstChild) {
                    divdias.removeChild(divdias.firstChild);
                }

                tranca(id);
                return;
           }

           function pinckcolor(idinput, idcolor) {
            var td = document.getElementById(idcolor);
            var color = document.getElementById(idinput);

            td.setAttribute('style', 'background-color:'+color.value+';');

           }

        </script>

</div>
