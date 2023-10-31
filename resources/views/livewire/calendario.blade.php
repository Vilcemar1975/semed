<div>
    <div class="w-full bg-blue-100 rounded-md text-center font-semibold text-[16pt] text-azul-100">
        ANO 2023
    </div>
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center " id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
            @foreach($menuCalendar as $itemenu)
                <li class="mr-2" role="presentation">
                    <button  class="inline-block p-4 border-b-2 rounded-t-lg uppercase text-azul-100" id="{{$itemenu['nick']}}-tab" onclick="abaTroca('{{ $loop->index }}')" data-tabs-target="#{{$itemenu['nick']}}" type="button" role="tab" aria-controls="{{$itemenu['nick']}}" aria-selected="false"  >{{$itemenu['mes']}}</button>
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
                            <tr  id="row_{{date('m_y', $startDate)}}" class="relative bg-white border-b dark:bg-gray-900 dark:border-gray-700 div_row" wire:click="pegarDia({{$startDate}})">
                                @for ($col=0; $col < 7; $col++ )

                                    @if (date('Y-m', $startDate) !== date('Y-m', $mes['calendar']))
                                        <td wire:key="{{ $loop->index }}" id="data_inativa" nome="data_inativa" class="relative text-center text-gray-300">
                                            <div><button type="button" class="px-6 py-4">
                                    @else
                                        <td  id="data_ativa_{{date('j_m_y', $startDate)}}" nome="data_ativa{{date('j_m_y', $startDate)}}"  class="relative  text-center text-azul-100 hover:bg-blue-100" >
                                            <button wire:key="{{ $loop->index }}" id="text_{{date('j_m_y', $startDate)}}" class="px-6 py-4 w-full" onclick="pegarData('{{date('j-m-y', $startDate)}}','data_ativa_{{date('j_m_y', $startDate)}}', '{{$loop->index}}')">
                                    @endif
                                                @php
                                                    echo date('j', $startDate);
                                                @endphp

                                            </button>
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
                    <form action="#" method="get">{{-- Salvar --}}
                        <h3 class="font-semibold">Evento</h3>
                        <label for="">Dias:</label>
                        <div id="divdias_{{$loop->index}}" class="flex gap-2 justify-start"></div>
                        <div class="flex flex-nowrap gap-2 justify-center">
                            <input id="inputdias_{{$loop->index}}" name="inputdias" type="hidden" value="">
                            <input id="date_actual_day_{{$loop->index}}" type="hidden" name="date_actual_day"  value="">
                            {{-- <input id="date_last_day_{{$loop->index}}" type="date" name="date_last_day"  value="" class="my-2 mx-auto w-[10rem] boder  h-8 rounded-md disabled:text-gray-400 disabled:border-gray-400" disabled> --}}
                            <input id="legenda_day_{{$loop->index}}" type="text" name="Legenta_day"  value="" class="my-2 w-full boder  border-azul-100 text-azul h-8  rounded-md disabled:text-gray-400 disabled:border-gray-400" placeholder="Legenda" disabled>

                        </div>

                        <div class="flex justify-center gap-5">
                            <div class="flex justify-start gap-2 w-full">
                                <label for="legenta_daycor" class="my-1 font-semibold">Cor: </label>
                                <div class="flex gap-4 justify-start rounded-md">
                                    <div class="flex">
                                        <label for="legenta_daycor_{{$loop->index}}" class="font-semibold text-[10pt] my-1 text-azul">BG </label>
                                        <input id="legenta_daycor_{{$loop->index}}" type="color" name="legenta_daycor"  value="#ccc" onchange="pinckcolor(this.value, '{{date('y')}}', '{{$loop->index}}')" class="my-1 h-8 border-1 rounded-lg" disabled><br>
                                        <div id="legenta_daycor_div_{{$loop->index}}" class="w-10 h-6 my-2" style="background-color: #fff"></div>
                                    </div>
                                    <div class="flex">
                                        <label for="legenta_daycor_txt{{$loop->index}}" class="font-semibold text-[10pt] my-1 text-azul">TXT </label>
                                        <input id="legenta_daycor_txt{{$loop->index}}" type="color" name="legenta_daycor_txt"  value="#ccc" onchange="pinckcolorTXT(this.value, '{{date('y')}}', '{{$loop->index}}')" class="my-1 h-8 border-1 rounded-lg" disabled><br>
                                        <div id="legenta_daycor_div_txt{{$loop->index}}" class="w-10 h-6 my-2" style="background-color: #075AA9"></div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="my-1 py-1 w-10 rounded-md text-center bg-green-600 hover:bg-green-800 text-white"><i class="fa-regular fa-floppy-disk"></i></button>
                            <button type="button" onclick="limpzaIndivial('{{$loop->index}}')" class="my-1 py-1 w-10 rounded-md text-center bg-azul-100 hover:bg-azul-500 text-white"><i class="fa-solid fa-broom"></i></button>
                        </div>

                    </form>
                    <form action="#" method="get">
                        <div class="flex justify-end gap-5">
                            <button type="button" onclick="limpeza('{{$loop->index}}')" class="py-1 my-2 w-[2rem] rounded-md text-center bg-azul-400 hover:bg-gray-200 text-gray-600"><i class="fa-regular fa-trash-can"></i></button>
                        </div>
                    </form>
                </div>
                <p class="w-full font-semibold text-[10pt] text-gray-500 text-center ">Para adicionar um evento só clicar nos numeros.</p>
            </div>
        @endforeach
        <script>
            const DIAS = [];
            var MES = "01";


            function abaTroca(index) {

                MES = "0";

                switch (index) {
                    case '0':
                        MES = "01";
                        break;
                    case '1':
                        MES = "02";
                        break;
                    case '2':
                        MES = "03";
                        break;
                    case '3':
                        MES = "04";
                        break;
                    case '4':
                        MES = "05";
                        break;
                    case '5':
                        MES = "06";
                        break;
                    case '6':
                        MES = "07";
                        break;
                    case '7':
                        MES = "08";
                        break;
                    case '8':
                        MES = "09";
                        break;
                    case '9':
                        MES = "10";
                        break;
                    case '10':
                        MES = "11";
                        break;
                    case '11':
                        MES = "12";
                        break;
                    default:
                        MES = null;
                        break;
                }

                //limpeza(index);
                return MES;

            }



            function pegarData(data, idbgcor, index) {

                var bgcor = document.getElementById(idbgcor);
                var container_Dias = 'divdias_'+index;
                var teste = DIAS.map(e => e.data).indexOf(data);


                if (teste != -1) {

                    DIAS.splice(DIAS.map(e => e.data).indexOf(data), 1);
                    bgcor.removeAttribute('style');
                    divcorBG("#fff", index);
                    divcorTXT("#075AA9", index);

                } else{

                    DIAS.push({'id': idCompser("data_ativa_", data) ,'data': data, 'cor': "#ccc", 'txtcor': ""});
                    bgcor.setAttribute('style', "background-color: #ccc; color:#000; font-weight: bold;");
                    divcorBG("#ccc", index);
                    divcorTXT("#000", index);

                }

                var day = [];
                for (let idx = 0; idx < DIAS.length; idx++) {

                    day.push(DIAS[idx].data);

                }


               document.getElementById('inputdias_'+index).value = day;

                apresentarDias(DIAS, container_Dias);

                desabilitarCampo(index);

                return;

            }

            function idCompser(name, data) {
                var dat = data.replaceAll('-', "_");
                var nome = name+dat;
                return nome;
            }


            function apresentarDias(array, container) {

                var containerDias = document.getElementById(container);

                containerDias.innerText = "";

                for (let cont = 0; cont < array.length; cont++) {

                    var dia = array[cont].data.split('-');

                    if (dia[1] == MES) {
                       var objeto =  criarDia("h4", dia[0], MES);
                       containerDias.appendChild(objeto);
                    }

                }


            }

            function pinckcolor(value, mesAno, index ) {

                //var calendar = MES+"-"+mesAno;

                var table = document.getElementById('table_body');
                var td = table.querySelectorAll('td');

                for (let indcor = 0; indcor < DIAS.length; indcor++) {

                    for (let ft = 0; ft < td.length; ft++) {

                        idcelular = td[ft].id.split('_')[2]+"-"+MES+"-"+td[ft].id.split('_')[4];

                        if (idcelular == DIAS[indcor].data) {

                            DIAS[indcor].cor = value;

                        }


                    }


                }

                for (let indcor_in = 0; indcor_in < DIAS.length; indcor_in++) {

                    let div = document.getElementById(DIAS[indcor_in].id);
                    div.style.background = DIAS[indcor_in].cor;
                    divcorBG(DIAS[indcor_in].cor, index);
                    console.log(div);
                }

                console.log(DIAS);

               return;
            }

            function pinckcolorTXT(value, mesAno, index ) {

                //var calendar = MES+"-"+mesAno;

                var table = document.getElementById('table_body');
                var td = table.querySelectorAll('td');

                for (let indcor = 0; indcor < DIAS.length; indcor++) {

                    for (let ft = 0; ft < td.length; ft++) {

                        idcelular = td[ft].id.split('_')[2]+"-"+MES+"-"+td[ft].id.split('_')[4];
                        if (idcelular == DIAS[indcor].data) {
                            DIAS[indcor].txtcor = value;

                        }


                    }


                }

                for (let indcor_in = 0; indcor_in < DIAS.length; indcor_in++) {

                    let div = document.getElementById(DIAS[indcor_in].id);
                    div.style.color = DIAS[indcor_in].txtcor;
                    divcorTXT(DIAS[indcor_in].txtcor, index);

                }


                return;
            }

            function criarDia(campo, dia, mes) {

                var area = document.createElement(campo);
                area.nameClass = ('px-2 py1 border border-azul-100 rounded-md');
                area.innerText = dia;

                return area;
            }

            function divcorBG(cor, index) {
                var divcor = document.getElementById('legenta_daycor_div_'+index);
                divcor.style.background = cor;
                return;
            }

            function divcorTXT(cor, index) {
                var divcor = document.getElementById('legenta_daycor_div_txt'+index);
                divcor.style.background = cor;
                return;
            }



            function desabilitarCampo(index) {
                console.log([DIAS.length, DIAS]);
                if (DIAS.length == 0) {
                    chavecampo('inputdias_'+index, true);
                    chavecampo('date_actual_day_'+index, true);
                    //chavecampo('date_last_day_'+index, true);
                    chavecampo('legenda_day_'+index, true);
                    chavecampo('legenta_daycor_'+index, true);
                    chavecampo('legenta_daycor_txt'+index, true);
                }else{
                    chavecampo('inputdias_'+index, false);
                    chavecampo('date_actual_day_'+index, false);
                    //chavecampo('date_last_day_'+index, false);
                    chavecampo('legenda_day_'+index, false);
                    chavecampo('legenta_daycor_'+index, false);
                    chavecampo('legenta_daycor_txt'+index, false);
                }

                return;
            }

            function chavecampo(campo, chave) {
                document.getElementById(campo).disabled = chave;
                return;
            }

            function limpzaIndivial(index) {
                var table = document.getElementById('table_body');
                var divcor = document.getElementById('divdias_'+index);
                var td = table.querySelectorAll('td');
                var iddatas = [];

                for (let dt = 0; dt < DIAS.length; dt++) {
                    let data = DIAS[dt].id;
                    let dmes =DIAS[dt].data.split('-')[1];
                    if (dmes == MES) {
                        iddatas.push(data);
                    }

                }

                for (let t = 0; t < iddatas.length; t++) {
                    document.getElementById(iddatas[t]).setAttribute('style',"background: #fff;");
                    DIAS.splice(DIAS.map(e => e.id).indexOf(iddatas[t]), 1);

                }

                divcor.innerText = "";
                console.log(DIAS);


            }

            function limparDias() {
                while (DIAS.length) {
                    DIAS.shift();
                }
            }

            function limpeza(index) {

                var table = document.getElementById('table_body');
                var td = table.querySelectorAll('td');

                for (let ft = 0; ft < td.length; ft++) {
                    td[ft].setAttribute('style',"background: #fff;");
                }

                /* for (let go = 0; go < DIAS.length; go++) {
                   DIAS.splice(DIAS.indexOf(go), 1);
                } */

                while (DIAS.length) {
                    DIAS.shift();
                }

                document.getElementById('inputdias_'+index).value = "";
                document.getElementById('date_actual_day_'+index).value = "";
                //document.getElementById('date_last_day_'+index).value = "";
                document.getElementById('legenda_day_'+index).value = "";
                document.getElementById('legenta_daycor_'+index).value = "#ccc";
                document.getElementById('legenta_daycor_txt'+index).value = "#ccc";
                document.getElementById('divdias_'+index).innerText = "";

                desabilitarCampo(index);

            }

        </script>
    </div>
</div>
