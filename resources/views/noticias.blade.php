@extends('template.app')

@section('title')
    Notícias
@endsection

@section('menu')
    @include('components.menu.menu_pric')
    @include('components.menu.titulo_princ',['title' => "Noticias"])
@endsection

@section('container-left')
    {{-- @include('components.cards.card_destaques_peq') --}}
    @include('components.menu.menu_topicos')
@endsection

@section('container-right')
    @include('components.cards.card_ultmas_noticias_peq',['dados' => $dados['ultimaNoticias']])

@endsection

@section('container-slider')
        @include('components.site_track')
        @include('components.sliders.slider',['dados' => $dados['sliderspreview']])
@endsection

@section('container-slider-bottom')

@endsection

@section('container-faixa')
    <div class="dest-card-contianer">
        @include('components.cards.card_destaque',['dados' => $dados['ultimaNoticias']])
    </div>
    <div class="faixa-prime">
        @include('components.cards.cardbox',['dados' => $dados['cardBox']])
        @include('components.cards.card_link_externo',['dados' => $dados['linksExternos']])
    </div>
    @include('components.cards.card_news', ['title' => "Notícias", 'dados' => $dados['ultimaNoticias']])
@endsection
@section('footer')
    @include('components.footer.menu_footer')
    @include('components.footer.logo_footer')
@endsection
