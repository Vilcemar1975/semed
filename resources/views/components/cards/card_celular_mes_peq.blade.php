<div class="card_calendar" style="display:block; width: 280px; margin-bottom: 10px; background-color: #fff ; color:#075AA9; border: 1px solid #075AA9; border-radius: 8px;">
    <div class="card_table" style="display: block; font-size: 15pt; font-weight: 700; text-align: center; text-transform: uppercase;">
        <h3>{{$title}}</h3>
    </div>
    <div class="card_table_body">
        <div class="flex flex-nowrap justify-around dia_rotulo" style="padding: 2px 0px; font-size: 12pt; font-weight: 700; background-color: #dddbdb">
            <h4>Dom</h4>
            <h4>Seg</h4>
            <h4>Ter</h4>
            <h4>Qua</h4>
            <h4>Qui</h4>
            <h4>Sex</h4>
            <h4>Sab</h4>
        </div>
        <section>
            @for ($x = 0; $x < 6; $x++)
                <div class="flex flex-nowrap justify-around semana" style="font-size: 12pt; font-weight: 500;">
                    @for ($c = 0; $c < 7; $c++)
                        <p class="dia text-center" style="display:block; width: 100%; padding: 10px;  background-color: #ffc">{{$c}}</p>
                    @endfor
                </div>
            @endfor
        </section>
        <div class="card_table_footer" style="padding: 2px 5px; font-size: 10pt; font-weight: 700; background-color: #dddbdb">
            Dias Letivos: 15 dias
        </div>
        <div class="card_table_recados" style="display: block; height: 120px; padding: 2px 5px; font-size: 10pt; font-weight: 400;">
            Recados
        </div>
    </div>
</div>

