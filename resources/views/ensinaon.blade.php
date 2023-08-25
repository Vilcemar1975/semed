@extends('template.app')

@section('title')
    Ensina ON
@endsection

@section('menu')
    @include('components.menu.menu_pric')
    @include('components.menu.titulo_princ',['title' => "Ensina ON"])
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
    {{-- Todos os videos --}}
    <div class="contaniner-padrao">
        <h3 class="rotulo-padrao">Lista de Video</h3>
        <div class="list-padrao">
            @for ($h=0;$h < 10;$h++)
                @include('components.cards.card_videos', [
                    'idvideo' => "",
                    'img' => "storage/padrao/videos_2.png",
                    'title' => "Titulo",
                    'texto' => "busca atender aos objetivos educacionais previamente estabelecido visando aspectos pedagógicos e sociais",
                ])
            @endfor
        </div>
    </div>
@endsection
@section('footer')
    @include('components.footer.menu_footer')
    @include('components.footer.logo_footer')
@endsection
