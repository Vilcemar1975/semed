{{-- @include('components.cards.card_colapser',[
                'idcard' => "",
                'title' => "",
                'img' => "",
                'texto' => "",
            ]) --}}

<div class="missao_total">
    <div class="missao_top" onclick="abrirCardNTE('{{ $idcard }}')">
        <h3>{{$title ?? ""}}</h3>
        <label for="botao_missao">
            <i id="ico_{{$idcard}}" class="fa-solid fa-chevron-up fa-rotate-180"></i>
        </label>
    </div>
    <div id="{{$idcard}}" class="missao_card" style="display:none">
        @if (!empty($idcard))
            <img src="{{asset($img ?? 'storage/padrao/img.jpeg')}}" alt="">
        @endif
        <div class="missao_corpo">
           <p>{{$texto ?? ""}}</p>
        </div>
    </div>
</div>
