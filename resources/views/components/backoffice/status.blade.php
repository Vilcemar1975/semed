{{-- @include('components.backoffice.status', [
            'public' => false,
            'public_day' => false,
            'date_start' => "",
            'date_end' => "",
            'hour_start' => "",
            'hour_end' => "",
            'no_public' => true,
        ]) --}}

<div class="block  mt-3 w-full">
    @include('components.backoffice.label',['idname' => 'status','label' => "Status"])
    <div class="block border p-3  rounded-lg  border-azul ">
        @include('components.backoffice.fildratius', ['idid' => "public", 'idname' => "public", 'label' => "Publicar", 'value' => "public", 'checkted' => $public ])
        <div id="public_date_time" class="text-azul-100">
            @include('components.backoffice.fildratius', ['idid' => "public_day", 'idname' => "public", 'label' => "Publicar Depois ", 'value' => "public_day", 'checkted' => $public_day ])

            <div id="datas_probramadas">
                <div class="flex gap-2 justify-end items-center mb-2">
                    <p>Inicio</p>
                    <input type="date" name="date_start" id="date_start" value="{{$date_start}}" class="rounded-lg border border-azul-100 text-azul-100 text-[10pt]">
                    <p class="mt-3 text-azul-100 font-semibold uppercase text-[9pt]"> as </p>
                    <input type="time" name="hour_start" id="hour_start" value="{{$hour_start}}" class="rounded-lg border border-azul-100 text-azul-100 text-[10pt]">
                </div>
                <div class="flex gap-2 justify-center items-cente mb-2">
                    <p>Data Para Término?</p>
                    <input id="checkteminio"  name="checkteminio" type="checkbox" class="border border-azul-100 rounded-sm" @if ($date_end != null) checked @endif>
                </div>
                <div id="data_termino" class="flex gap-2 justify-end">
                    <input type="date" name="date_end" id="date_end" value="{{$date_end}}" class="rounded-lg border border-azul-100 text-azul-100 text-[10pt]">
                    <p class="text-azul-100 font-semibold uppercase text-[9pt]"> as </p>
                    <input type="time" name="hour_end" id="hour_end" value="{{$hour_end}}" class="rounded-lg border border-azul-100 text-azul-100 text-[10pt]">
                </div>
            </div>

        </div>
        @include('components.backoffice.fildratius', ['idid' => "no_public", 'idname' => "public", 'label' => "Não Publicar", 'value' => "no_public", 'checkted' => $no_public ])
    </div>
</div>

<script>

    document.addEventListener('DOMContentLoaded', function() {
     verificaPublicDay();
     document.getElementById('public_day').addEventListener('change', verificaPublicDay);

    });

    document.addEventListener('DOMContentLoaded', function() {

    verificaTeminiData();
    document.getElementById('checkteminio').addEventListener('change', verificaTeminiData);

    });

    document.getElementById('public').addEventListener('click', function () {
        document.getElementById('datas_probramadas').style.display = 'none';
        limparDataHora();

    });

    document.getElementById('no_public').addEventListener('click', function () {
        document.getElementById('datas_probramadas').style.display = 'none';
        limparDataHora();
    });

    function verificaPublicDay() {
        // Obtém o elemento do radio button
        var publicDayRadio = document.getElementById('public_day');

        // Obtém o elemento da div a ser exibida/oculta
        var datasProgramadasDiv = document.getElementById('datas_probramadas');

        // Verifica se o radio button está marcado
        if (publicDayRadio.checked) {
            // Torna a div visível
            datasProgramadasDiv.style.display = 'block';
        } else {
            // Torna a div oculta
            datasProgramadasDiv.style.display = 'none';
        }
    }

    function verificaTeminiData() {
        // Obtém o elemento do radio button
        var checkteminio = document.getElementById('checkteminio');

        // Obtém o elemento da div a ser exibida/oculta
        var data_termino = document.getElementById('data_termino');

        // Verifica se o radio button está marcado
        if (checkteminio.checked) {
            // Torna a div visível
            data_termino.style.display = 'flex';
        } else {
            // Torna a div oculta
            data_termino.style.display = 'none';
        }
    }

    function limparDataHora(){
        document.getElementById('date_start').value = "";
        document.getElementById('hour_start').value = "";
        document.getElementById('date_end').value = "";
        document.getElementById('hour_end').value = "";
        document.getElementById('data_termino').style.display = 'none';
        document.getElementById('checkteminio').checked = false;
    }
</script>



