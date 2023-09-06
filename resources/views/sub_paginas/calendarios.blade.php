@extends('template.app')

@section('title')
    Calendário Escolar de 2023
@endsection

@section('menu')
    @include('components.menu.menu_pric')
    @include('components.menu.titulo_princ',['title' => "Calendário Escolar de 2023"])
@endsection

@section('subtop')
    <div class="text-center text-sm font-medium text-azul-100">
        <p>FUNDAMENTAÇÃO LEGAL: LDB nº 9.394/1996; Lei nº 4.100/2003; Resolução CME nº 10/2011.</p>
    </div>
    <br>
@endsection

@section('container-left')

@endsection

@section('container-right')

@endsection

@section('container-slider')

@endsection

@section('container-slider-bottom')

@endsection

@section('container-faixa')
    <div class="flex flex-wrap justify-around p-5">
        @for ($g=0; $g < 12; $g++)
            @include('components.cards.card_celular_mes_peq', [
                'iddata' => "",
                'title' => "Janeiro",
                'dias' => [],
            ])
        @endfor
    </div>

    <div class="faixa-prime">
        @include('components.cards.cardbox',['dados' => $dados['cardBox']])
        @include('components.cards.card_link_externo',['dados' => $dados['linksExternos']])
    </div>
@endsection
@section('footer')
    @include('components.footer.menu_footer')
    @include('components.footer.logo_footer')
@endsection

@section('scriptbottom')

@endsection
