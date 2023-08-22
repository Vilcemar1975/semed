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
        @for ($r=0;$r < 3; $r++)
            <a href="#">
                <div class="dest-card">
                    <img src="{{asset('storage/padrao/videos_2.png')}}" alt="">
                    <div class="dest-card-body">
                        <h3>Titulo Destaques</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur. Dolor sit amet dolor sit amet.</p>
                        <div class="dest-card-footer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-event" viewBox="0 0 16 16">
                                <path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
                                <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z"/>
                            </svg>
                            <p>12/08/2023</p>
                        </div>
                    </div>

                </div>
            </a>
        @endfor
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
