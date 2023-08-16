@extends('template.app')

@section('title')
    Notícias
@endsection

@section('menu')
    @include('components.menu.menu_pric')
@endsection

@section('container-left')
    @include('components.cards.card_destaques')
@endsection

@section('container-right')
    @include('components.cards.card_ultmas_noticias',['dados' => $dados['ultimaNoticias']])

@endsection

@section('container-slider')
    <div class="box-qrt"></div>
        @include('components.sliders.slider',['dados' => $dados['sliderspreview']])


@endsection

@section('container-slider-bottom')
    <div class="mensagem">
        <p>Escola Tá ON é a plataforma que te deixa mais conectado com a educação no município de Vila Velha. Este é um lugar de interação entre os estudantes, as famílias e a comunidade escolar. Aqui você encontra conteúdos pedagógicos, interdisciplinares e informações sobre os projetos educacionais que estão acontecendo nas unidades municipais. Seja bem-vindo!</p>
    </div>

    <a href="#" class="flex p-2 mt-3 mb-3 bg-white text-azul-100 rounded-lg shadow-md">
        <img src="{{asset('storage/padrao/img.jpeg')}}" alt="" width="120px" height="60px">
        <div class="pl-2 over flow-hidden">
            <h4 class="text-sm font-bold">Destaques Necessário</h4>
            <p>Para eventos que vão acontecer, arquivos disponíveis para baixar. Outros pedidos de que necessitam aparecer aqui.</p>
        </div>
    </a>

@endsection

@section('container-fixa')
    <div class="faixa-prime">
        @include('components.cards.cardbox',['dados' => $dados['cardBox']])
        @include('components.cards.card_link_externo',['dados' => $dados['linksExternos']])
    </div>
    @include('components.cards.card_news');
@endsection
